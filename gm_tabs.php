<?php
/*
  GeoMaker by Christian Heilmann (navgation tabs)
  Version: 1.0
  Homepage: http://icant.co.uk/geomaker/
  Copyright (c) 2009, Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
?>
<div class="yui-gb" id="tabs">
  <div class="yui-u first
  <?php if($stage == 'start'){ echo ' current';}?>
  "><?php echo $labels['menu'][0];?></div>
  <div class="yui-u
  <?php if($stage == 'filter'){ echo ' current';}?>
  "><?php echo $labels['menu'][1];?></div>
  <div class="yui-u
  <?php if($stage == 'output'){ echo ' current';}?>
  "><?php echo $labels['menu'][2];?></div>
</div>
