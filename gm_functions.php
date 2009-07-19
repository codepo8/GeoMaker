<?php
/*
  GeoMaker by Christian Heilmann (helper methods)
  Version: 1.0
  Homepage: http://icant.co.uk/geomaker/
  Copyright (c) 2009, Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
?>
<?php
  /*
    Renders the table in the filtering section
  */
  function table($places){
    $foundplaces = makewoeidhash($places);
    $matches = array();
    $out.='<div id="sorter"><table id="foundresults">';
    $out.= '<caption>Found Locations </caption>';
    $out.= '<thead>';
    $out.= '<th scope="row">Use</th>';
    $out.= '<th scope="row">Match</th>';
    $out.= '<th scope="row">Real Name</th>';
    $out.= '<th scope="row">Type</th>'; 
    $out.= '<th scope="row">woeid</th>'; 
    $out.= '<th scope="row">Latitude</th>';
    $out.= '<th scope="row">Longitude</th>';
    $out.= '</thead>';
    $out.= '<tbody>';
    $refs = $places->document->referenceList->reference;
    $count =0;
    $history = array();
    foreach($refs as $r){
      foreach($r->woeIds as $wi){
        if(!in_array($wi.'',$history)){
          $history[] = $wi.'';
          $currentloc = $foundplaces["woeid".$wi];
          if($r->text!='' && $currentloc['name']!='' && 
          $currentloc['lat']!='' && $currentloc['lon']!=''){
          $count++;
          $out.= ($count %2==0) ? '<tr class="odd">' : '<tr>';
          $text = preg_replace('/\n/','',$r->text);
          $text = preg_replace('/\s+/',' ',$r->text);
          $current = $wi.'|'.$currentloc['name'].'|'.$text.'|'.
                     $currentloc['lat'].'|'.$currentloc['lon'];
          $matches[] = $text;
          $out.= '<td><input type="checkbox" checked="checked"'.
                 'name="collection[]" value="'.$current.'"></td>'.
                 '<td>'.$r->text.'</td>'.
                 '<td>'.str_replace(', ZZ','',
                 $currentloc['name']).'</td>'.
                 '<td>'.$currentloc['type'].'</td>'.
                 '<td>'.$wi.'</td>'.
                 '<td>'.$currentloc['lat'].'</td>'.
                 '<td>'.$currentloc['lon'].'</td>'.
                 '</tr>';
          }
        }
      }
    }
    $out.= '</tbody></table></div>';
    return array('table'=>$out,'matches'=>$matches);
  }
  function cleanup($elm){
    return preg_replace('/\n\r?+/','',addslashes($elm));
  }                                 
  
?>
