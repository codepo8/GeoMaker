<?php
/*
  GeoMaker by Christian Heilmann (api)
  Version: 1.0
  Homepage: http://icant.co.uk/geomaker/
  Copyright (c) 2009, Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
?>
<?php
error_reporting(0);
include('apifunctions.php');
include('converters.php');
if(!isset($_GET['url'])){?>
<pre>
  GeoMaker API (of sorts)
  -----------------------
  If you hate interfaces, this is the place for you! 
  
  Simply send parameters and GeoMaker does stuff for you. 
  
  url (required) - the URL to load and analyze 
  output (required) - what to give back to you 
  
  output=map                 - returns the map include code to put into any 
                               HTML document
  output=json                - returns a JSON object of matched locations as 
                               a JSON array of objects. Each object has a lat,
                               lon and title property.
  output=json&callback=foo   - does the same but wraps it in foo()
  output=microformats        - returns the microformats HTML
  output=kml                 - returns the data as KML
  output=csv                 - returns the data as CSV
  
  Debugging: 
  
    If you set raw=true you can see the content retrieved from the URL 
    and the XML returned by Placemaker.
  
  Try, try again, Mr. Wint:
  
  * <a href="api.php?url=http://news.yahoo.com&output=json">http://icant.co.uk/geomaker/api.php?url=http://news.yahoo.com&output=json</a>
  * <a href="api.php?url=http://news.yahoo.com&output=json&callback=foo">http://icant.co.uk/geomaker/api.php?url=http://news.yahoo.com&output=json&callback=foo</a>
  * <a href="api.php?url=http://news.yahoo.com&output=microformats">http://icant.co.uk/geomaker/api.php?url=http://news.yahoo.com&output=microformats</a>
  
</pre>
<?php } else {
$o = $_GET['output'];
$key = 'z_MvdPDV34GB61qhSzVW8ZZ7UZsa00hBP5IadD7JJ8Rm7V74xkKAn0l4R.OUNBc-';
$c = grab($_GET['url']);
if(strstr($c,'<')){
  $c = preg_replace("/.*<results>|<\/results>.*/",'',$c);
  $c = preg_replace("/<\?xml version=\"1\.0\" encoding=\"UTF-8\"\?>/",'',$c);
  $c = strip_tags($c);
  $c = preg_replace("/[\r?\n]+/"," ",$c);
  if(isset($_GET['raw'])){echo "<h1>Content</h1>\n\n".htmlentities($c);};
  $x = postToPlacemaker($c);     
  if(isset($_GET['raw'])){echo "<h1>Placemaker</h1>\n\n<pre>".htmlentities($x)."</pre>";};
  $places = simplexml_load_string($x, 'SimpleXMLElement', LIBXML_NOCDATA);    
  $out = '';
  if($places->document->placeDetails){
    $foundplaces = makewoeidhash($places);
    $refs = $places->document->referenceList->reference;
    foreach($refs as $r){
      foreach($r->woeIds as $wi){
        $currentloc = $foundplaces["woeid".$wi];
        if($r->text!='' && $currentloc['name']!='' && $currentloc['lat']!='' && $currentloc['lon']!=''){
          $text = preg_replace('/\s+/',' ',$r->text);
          $current = $wi.'|'.str_replace(', ZZ','',$currentloc['name']).'|'.$text.'|'.$currentloc['lat'].'|'.$currentloc['lon'];
          $chunks = explode('|',$current);  
          switch ($o){
            case 'microformats':
            $mf[] = geomf($chunks);
            break;
            case 'json':
            case 'map':
            $points[] = json($chunks);
            break;
            case 'kml':
            $kml[] = kml($chunks);
            break;
            case 'csv':
            $csv[] = csv($chunks);
            break;
            case 'lol':
            $lol[] = lol($chunks);
            break;
            case 'trek':
            $trek[] = trek($chunks);
            break;
          }
        }
      }
    }

     if($o=='kml'){
       $kml = implode("\n",$kml);
       header('content-type:application/vnd.google-earth.kml+xml');
       header('Content-disposition: attachment; filename=locations.kml');
       echo '<'.'?xml version="1.0" encoding="UTF-8"?'.'>';
       echo '<kml xmlns="http://www.opengis.net/kml/2.2"><Document>'.$kml;
       echo '</Document></kml>';
     }
     if($o=='csv'){
       $csv = implode("\n",$csv);
       header('Content-type: application/vnd.ms-excel');
       header('Content-disposition: attachment; filename=locations.csv');
       echo 'woeid,name,description,latitude,longitude'."\n";
       echo $csv;
     }
     if($o=='map'){
       $points = '['.implode(',',$points).']';
       header('content-type:text/plain');
       include('mapcode.php');
     }
     if($o=='lol'){
       $lol = implode("\n",$lol);
       header('content-type:text/plain');
       echo "O HAI\n$lol\nKTHNXBAI";
     }
     if($o=='trek'){
       $trek = implode("\n",$trek);
       header('content-type:text/plain');
       echo "Build:NCC1701\nEnergize\n$trek\nKhaaaaaaaaaaaaaaaaaaaaaaaan!";
     }
     if($o=='json'){
       $points = '['.implode(',',$points).']';
       header('content-type:text/javascript');
       if(isset($_GET['callback'])){
         echo $_GET['callback'].'('.$points.')';
       } else {
         echo $points;
       }
     }
     if($o=='microformats'){
       $mf = implode("\n",$mf);
       header('content-type:text/plain');
       echo $mf;
     }
      
  } else {
    if($o=='trek'){
      header('content-type:text/plain');
      echo "Gone where no man has gone before. Found nothing.";
    }
    if($o=='lol'){
      header('content-type:text/plain');
      echo "CAN HAS NO LOLCATIONS.\nHAS A SAD NOW.";
    }
     if($o=='map'){
       header('content-type:text/plain');
       echo '<p>Error: Could not find any locations :(</p>';
     }
     if($o=='json'){
       header('content-type:text/javascript');
       if(isset($_GET['callback'])){
         echo $_GET['callback'].'({"error":"no locations found"})';
       } else {
         echo '{"error":"no locations found"}';
       }
     }
     if($o=='microformats'){
       header('content-type:text/plain');
       echo '<!-- no locations found -->';
     }
   }
 }
}
?>