<?php
/*
  GeoMaker by Christian Heilmann (main controller)
  Version: 1.0
  Homepage: http://icant.co.uk/geomaker/
  Copyright (c) 2009, Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
?>
<?php 

  include('gm_config.php');
  include('apifunctions.php');
  include('gm_functions.php');
  include('gm_labels.php');

/*
    START SCREEN 
*/

  if(!isset($_POST['stage'])){
    $stage = 'start';
  }

/*
    FILTER SCREEN 
*/

  if($_POST['stage']=='filter'){

    /* If the user sent a URL */    

    if(isset($_POST['url']) and $_POST['url']!=''){
      unset($_POST['message']);
      if($_POST['isrss']=='on'){
        $url = $_POST['url'];
        $apiendpoint = 'http://wherein.yahooapis.com/v1/document';
        $inputType = 'text/rss';
        $outputType = 'rss';
        $post = 'appid='.$key.'&documentURL='.$url.'&documentType='.
                $inputType.'&outputType='.$outputType;
        $ch = curl_init($apiendpoint);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $results = curl_exec($ch);
        curl_close($ch);
        // echo htmlentities($results);
        // ^ for dirty testing
        if(!preg_match('/yahoo:error/',$results)){
          $results = preg_replace('/cl:/','cl',$results);
          $places = simplexml_load_string($results, 'SimpleXMLElement', 
                                           LIBXML_NOCDATA);  
          $out = '';
          if($places->channel->item){
            foreach($places->channel->item as $p){
              $locs = $p->clcontentlocation;
              if($locs){
                $content = '<h2><a href=\"'.$p->link.'\">'.cleanup($p->title).
                           '</a></h2><div class=\"feedcontent\">'.
                           cleanup($p->description).'</div>';
                $out .= '<li><h3><a href="'.$p->link.'">'.
                        stripslashes(cleanup($p->title)).
                        '</a></h3><div class="yui-ge">'.
                        '<div class="yui-u first">'.
                        '<div class="feedcontent">'.
                        stripslashes(cleanup($p->description)).
                       '</div></div><div class="yui-u">';
                foreach($locs->clplace as $pl){
                  $name = str_replace(', ZZ','',$pl->clname);
                  // ^ stupid placemaker bug 
                  $current = $p->clwoeId.'|'.$name.'|'.
                             htmlentities($content).'|'.
                             $pl->cllatitude.'|'.$pl->cllongitude.'|'.
                             cleanup($p->title);
                  $out .= '<div><input checked="checked" type="checkbox"'.
                          ' name="collection[]" value="'.$current.
                          '">'.$name.'</div>';            
                }
                $out .= '</div></div></li>';
              }
            }
          }
          if($out!=''){
            $output = '<ul id="feed">'.$out.'</ul>';
            $stage = 'filter';
          } else {
            $error = $labels['start']['errors']['nolocations'];
            $stage = 'start';
          }
        } else {
          if(preg_match('/Document exceeds maximum length/',$results)){
            $error = $labels['start']['errors']['toolargedocument'];
          }
          if(preg_match('/Cannot fetch the document./',$results)){
            $error = $labels['start']['errors']['filenotfound'];
          }
          if(preg_match('/Not valid UTF-8 encoded text/',$results)){
            $error = $labels['start']['errors']['wrongencoding'];
          }
          $stage = 'start';
        }
      } else {
        $content = grab($_POST['url']);
        if(preg_match('/<results><body/',$content)){
          $c = preg_replace("/.*<results>|<\/results>.*/",'',$content);
          $c = preg_replace("/<\?xml version=\"1\.0\" encoding=\"UTF-8\"\?>/",'',$c);
          $c = strip_tags($c);
          $cleancontent = preg_replace("/[\r?\n]+/"," ",$c);
          $places = postToPlacemaker($cleancontent);
          $places = simplexml_load_string($places, 'SimpleXMLElement',LIBXML_NOCDATA);
          $out = '';
          if($places->document->placeDetails){
            $table = table($places);
            $stage = 'filter';
          } else {
            $error = $labels['start']['errors']['nolocations'];
            $stage = 'start';
          }  
        } else {
          $error = $labels['start']['errors']['filenotfound'];
          $stage = 'start';
        }
      }
    }

    /* If the user sent a message rather than a URL */    
    
    if(isset($_POST['message']) and $_POST['message']!=''){
      $message = filter_input(INPUT_POST, 'message',FILTER_SANITIZE_STRING, array("flags" => array(FILTER_FLAG_STRIP_LOW,FILTER_FLAG_STRIP_HIGH)));
      $places = postToPlacemaker($_POST['message']);
      $places = simplexml_load_string($places, 'SimpleXMLElement',LIBXML_NOCDATA);
      $out = '';
      if($places->document->placeDetails){
        $table = table($places);
        $matches = $table['matches'];
        $highlightedmessage = strip_tags($message);
        foreach($matches as $m){
          $highlightedmessage = preg_replace('/'.$m.'/','<strong>'.$m.'</strong>',$highlightedmessage);
        }
        $stage = 'filter';
      } else {
        $error = $labels['start']['errors']['nolocations'];
        $stage = 'start';
      }  
    }
    
    /* If there was neither message nor url (duh) */

    if((!isset($_POST['message']) and !isset($_POST['url'])) 
       or ($_POST['message']=='' and $_POST['url']=='')){
      $error = $labels['start']['errors']['nothingsent'];
      $stage = 'start';
    }
  }

/*
    OUTPUT SCREEN 
*/

  if($_POST['stage']=='output'){
    $points = preg_replace('/\n|\r/msi','','['.join(',',$_POST['collection']).']');
    $points = array();
    $mf = array();
    $imf = array();
    $mfmessage = $_POST['message'];
    foreach($_POST['collection'] as $c){
     $chunks = explode('|',$c);
     if(isset($_POST['rss'])){
       $points[] = '{"lat":"'.$chunks[3].'","lon":"'.$chunks[4].
                   '","content":"'.$chunks[2].'","title":"'.$chunks[1].
                   ': '.$chunks[5].'"}';
     } else {
     $cmf ="\n\n<-- match:".$chunks[2]." -->\n".
               "<span class=\"vcard\">\n<span class=\"adr\">\n".
               "<span class=\"locality\">$chunks[2]</span>\n".
               "</span>\n<span class=\"geo\">(\n".
               "<span class=\"latitude\">$chunks[3]</span>,\n".
               "<span class=\"longitude\">$chunks[4]</span>".
               "\n)</span>\n</span>";
     $mf[] = $cmf;
     $imf = preg_replace('/\n|<--.*-->/','',$cmf);
     $mfmessage = preg_replace('/'.$chunks[2].'/',$imf,$mfmessage);        
       $points[] = '{"lat":"'.$chunks[3].'","lon":"'.$chunks[4].
                   '","title":"'.$chunks[1].'"}';
     }
    }
    $points = '['.join(',',$points).']';
    $stage = 'output';
  }
?>