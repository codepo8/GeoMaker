<?php
/*
  GeoMaker by Christian Heilmann (footer)
  Version: 1.0
  Homepage: http://icant.co.uk/geomaker/
  Copyright (c) 2009, Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
?>
<?php if(preg_match('/localhost/',$_SERVER['HTTP_HOST'])){?>
  <link rel="stylesheet" href="reset-fonts-grids.css" type="text/css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="base-min.css" type="text/css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="geomaker.css" type="text/css" media="screen" title="no title" charset="utf-8">
  
<?php }?>
  <div id="ft" role="contentinfo">
  <p>GeoMaker by <a href="http://wait-till-i.com">Christian Heilmann</a>, using <a href="http://developer.yahoo.com/yui">YUI</a>, <a href="http://developer.yahoo.com/yql">YQL</a> and <a href="http://developer.yahoo.com/geo">Yahoo Geo Technologies</a> - <a href="api.php">API</a></p></div>
</div>


<?php if(preg_match('/icant/',$_SERVER['HTTP_HOST'])){?>
<div id="donate"><h2>Like GeoMaker? Support it.</h2><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="6912131">
<input type="image" src="https://www.paypal.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form></div>
<!-- Start of StatCounter Code -->
<script type="text/javascript">
var sc_project=968400,sc_invisible=1,sc_partition=46,
    sc_click_stat=1,sc_security="55a9fb8f",sc_text=2; 
</script>
<script type="text/javascript"
src="http://www.statcounter.com/counter/counter.js"></script><noscript><div
class="statcounter"><a title="iweb stats"
href="http://www.statcounter.com/iweb/" target="_blank"><img
class="statcounter"
src="http://c.statcounter.com/968400/0/55a9fb8f/1/"
alt="iweb stats" ></a></div></noscript>
<!-- End of StatCounter Code -->
<?php }?>
