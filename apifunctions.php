<?php
/*
  GeoMaker by Christian Heilmann (api helper functions)
  Version: 1.0
  Homepage: http://icant.co.uk/geomaker/
  Copyright (c) 2009, Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
?>
<?php
function makewoeidhash($places){
  $foundplaces = array();
  foreach($places->document->placeDetails as $p){
    $wkey = 'woeid'.$p->place->woeId;
    $foundplaces[$wkey]=array(
      'name'=>str_replace(', ZZ','',$p->place->name).'',
      'type'=>$p->place->type.'',
      'woeId'=>$p->place->woeId.'',
      'lat'=>$p->place->centroid->latitude.'',
      'lon'=>$p->place->centroid->longitude.''
    );
  }
  return $foundplaces;
}
function postToPlacemaker($content){
  global $key;
  $ch = curl_init(); 
  if(isset($_GET['lang'])){
    $lang = '&inputLanguage='.$_GET['lang'];
  }
  define('POSTURL', 'http://wherein.yahooapis.com/v1/document');
  define('POSTVARS', 'appid='.$key.'&documentContent='.urlencode($content).
                  '&documentType=text/plain&outputType=xml'.$lang);
  
  $ch = curl_init(POSTURL);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, POSTVARS);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
  $x = curl_exec($ch);
  curl_close($ch);
  return $x;
}

function grab($url){
  $realurl ='http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%20%3D%20%22'.urlencode($url).'%22&format=xml';
  $ch = curl_init(); 
  curl_setopt($ch, CURLOPT_URL, $realurl); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  $c = curl_exec($ch); 
  curl_close($ch);
  return $c;
}
?>