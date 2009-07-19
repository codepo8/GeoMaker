<?php
/*
  GeoMaker by Christian Heilmann (labels file)
  Version: 1.0
  Homepage: http://icant.co.uk/geomaker/
  Copyright (c) 2009, Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
$labels = array(
  'start' => array(
    'title' => 'GeoMaker - Convert web sites and texts into Maps and Geo Microformats',
    'intro' => 'GeoMaker creates microformats and maps from geographical information embedded in texts. You can either provide a URL to load and hit the "load content" button or start typing your own text and hit the "get locations" button to continue.',
    'errors' => array(
      'nothingsent' => 'You didn\'t send anything to be analysed. I am confused.',
      'filenotfound' => 'I couldn\'t find that file, sorry.',
      'wrongencoding' => 'This file claims to be UTF-8 but isn\'t - this doesn\'t work, sorry.',
      'toolargedocument' => 'This document is too big, 50kb max, sorry.',
      'nolocations' => 'I couldn\'t find any geographical locations in that file, sorry.'
    )
  ),
  'filter' => array(
    'title' => 'GeoMaker - Review and filter your results',
    'intro' => 'Cleanup time. As not all things machines find for us are really what we were looking for check the table below and uncheck results you don\'t want to have on your map. Possible duplicates have already been unchecked. Once you\'re done, hit the generate button to continue.'
  ),
  'output' => array(
    'title' => 'GeoMaker - get your map and microformats code',
    'intro' => 'And we\'re done. Below you\'ll see the map with your locations, the code to copy and paste to embed your own map and your locations as microformats.'
  ),
  'menu' => array(
    '<h2><span>1 </span>Input</h2><p>Enter or load content</p>',
    '<h2><span>2 </span> Filter</h2><p>Pick geo locations</p>',
    '<h2><span>3 </span> Output</h2><p>Get map and microformats code</p>'
  )
);
?>