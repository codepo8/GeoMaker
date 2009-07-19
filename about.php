<?php
/*
  GeoMaker by Christian Heilmann (about page)
  Version: 1.0
  Homepage: http://icant.co.uk/geomaker/
  Copyright (c) 2009, Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
  <title>About GeoMaker</title>
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/combo?2.7.0/build/reset-fonts-grids/reset-fonts-grids.css&2.7.0/build/base/base-min.css">
  <link rel="stylesheet" type="text/css" href="geomaker.css">
  <script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/yuiloader/yuiloader-min.js"></script> 
</head>
<body class="yui-skin-sam">
<div id="doc" class="yui-t7">
  <div id="hd" role="banner">
    <h1>GeoMaker - About</h1>
    <?php include('nav.php');?>
  </div>
  <div id="bd" role="main" class="infopage">
    <form action="index.php" method="post">
      <h2>Free your geographical information</h2>
      <p>GeoMaker allows you to find and display geographical information in texts, web sites and RSS feeds.</p>
      <p>By using GeoMaker you can turn any of these resources into a map or <a href="http://microformats.org/wiki/geo">Microformats</a> to embed into your own web sites, blogs and apps.</p>
      <object width="480" height="385"><param name="movie" value="http://www.youtube.com/v/YkAAZf7JCjE&hl=en&fs=1&rel=0&color1=0x006699&color2=0x54abd6"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/YkAAZf7JCjE&hl=en&fs=1&rel=0&color1=0x006699&color2=0x54abd6" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="480" height="385"></embed></object>

      <h2>People</h2>
      
      <p>GeoMaker was written by <a href="http://icant.co.uk">Chris Heilmann</a> (<a href="http://twitter.com/codepo8">@codepo8 on Twitter</a>, the <a href="http://wait-till-i.com">blog is here</a>) with refinement help by the Yahoo Geo Team.</p>
      
      <h2>A peek under the hood</h2>
      
      <p>In essence, GeoMaker is an easier interface to two web services: <a href="http:/developer.yahoo.com/geo/placemaker">Yahoo Placemaker</a> and <a href="http:developer.yahoo.com/maps/ajax">Yahoo Maps</a>.</p>
      <p>You can achieve the same results with Placemaker itself, but the filtering of false locations has to be done by hand, which is why we thought an interface would be a good plan. It is also possible to replace the Yahoo Maps output with another provider, for example Google maps and future versions of GeoMaker will get this feature.</p>
      <p>The interface was build using the <a href="http://developer.yahoo.com/yui">Yahoo User Interface library</a>, especially the YUI grids, fonts, base, data table and button.</p>

      <h2>Get GeoMaker</h2>
      
      <p>GeoMaker is this web site, but you can also download it and install it on your own server, for details check the <a href="developers.php">developers section</a>.</p>

      <?php include('licensing.php');?>
            
      <div class="submit">
        <input type="submit" id="send" value="Start using GeoMaker">
      </div>
    </form>
  </div>
  <?php include('gm_footer.php');?>
  <script type="text/javascript" charset="utf-8" src="geomaker.js"></script>
</body>
</html>
