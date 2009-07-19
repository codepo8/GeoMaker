<?php
/*
  GeoMaker0 by Christian Heilmann (api converters)
  Version: 1.0
  Homepage: http://icant.co.uk/geomaker/
  Copyright (c) 2009, Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
?>
<?php 
function lol($chunks){
  return "HAS A LOL-CATION: \n\t\tCAN HAS WOEID: $chunks[0] \n\t\tHAS A NAME: $chunks[1] \n\t\tHAS A DISCRIPSHUN: $chunks[2] \n\t\tI'M IN YOUR LATITUDE: $chunks[3] \n\t\tI'M IN YOUR LOLITUDE: $chunks[4] \nHAS A READY.";
}
function trek($chunks){
  return "Set course: \n\t\tLogical: $chunks[0] \n\t\tOn viewscreen: $chunks[1] \n\t\tCaptain's log: $chunks[2] \n\t\tAlien babes to kiss at: $chunks[3], $chunks[4] \nMake it so.";
}
function csv($chunks){
  return $chunks[0].',"'.$chunks[1].'","'.$chunks[2].'",'.$chunks[3].','.$chunks[4];
}
function kml($chunks){
return '<Placemark>'.
       '<name>'.$chunks[1].'</name>'.
       '<description>'.$chunks[1].'</description>'.
       '<Point>'.
       '<coordinates>'.$chunks[4].','.$chunks[3].',0</coordinates>'.
       '</Point>'.
       '</Placemark>';
}
function json($chunks){
  return '{"lat":"'.$chunks[3].'","lon":"'.$chunks[4].'","title":"'.$chunks[1].'","match":"'.$chunks[2].'"}';
}
function geomf($chunks){
  return "\n\n<-- match:".$chunks[2]." -->\n".
         "<span class=\"vcard\">\n<span class=\"adr\">\n".
         "<span class=\"locality\">$chunks[1]</span>\n".
         "</span>\n(<span class=\"geo\">\n".
         "<span class=\"latitude\">$chunks[3]</span>,\n".
         "<span class=\"longitude\">$chunks[4]</span>". 
         "\n</span>)\n</span>";
}
?>