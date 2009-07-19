<?php
/*
  GeoMaker by Christian Heilmann (developers page)
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
  <title>GeoMaker for Developers, Developers, Developers&hellip;</title>
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/combo?2.7.0/build/reset-fonts-grids/reset-fonts-grids.css&2.7.0/build/base/base-min.css">
  <link rel="stylesheet" type="text/css" href="geomaker.css">
  <script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/yuiloader/yuiloader-min.js"></script> 
</head>
<body class="yui-skin-sam">
<div id="doc" class="yui-t7">
  <div id="hd" role="banner">
    <h1>GeoMaker for Developers</h1>
    <?php include('nav.php');?>
  </div>
  <div id="bd" role="main" class="infopage">
    <form action="index.php" method="post">
      <p class="intro">GeoMaker for developers comes in two flavours: you can either download GeoMaker and use it on your own server or just <a href="#api">use the API</a>.</p>
      
      <h2>Get GeoMaker</h2>
      
      <p>You can download GeoMaker for yourself and install it on your own server or localhost instead of coming back here. The code is available on GitHub:</p>
      <p id="github"><a href="http://github.com/codepo8/GeoMaker/tree/master">http://github.com/codepo8/GeoMaker/tree/master</a></p>
      
      <h2>Requirements and Installation</h2>

      <p>To run GeoMaker on your own server, you need to have the following:</p>
      <ul>
        <li>An own license key for Placemaker, available at the <a href="https://developer.yahoo.com/wsregapp/">Yahoo Developer Network site</a>.</li>
        <li>PHP 5 with cURL and simpleXML enabled.</li>
      </ul>
      <p>To install, just download GeoMaker and put it in a folder on your server. <a href="https://developer.yahoo.com/wsregapp/">Get your license key</a>, replace the one inside <code>gm_config.php</code> and upload it. You can then <a href="test.php">test your configuration by opening <code>test.php</code></a>.</p>
      
      <h2>Licensing</h2>

      <?php include('licensing.php');?>
      
      <h2 id="api">API</h2>
      
      <p>GeoMaker comes with an API, too. The API endpoint is:</p>
      <p><code>http://icant.co.uk/geomaker/api.php</code></p>
      <p>And here are the docs:</p>
      <?php include('api.php');?>
      <div class="submit">
        <input type="submit" id="send" value="Start using GeoMaker">
      </div>
    </form>
  </div>
  <?php include('gm_footer.php');?>
  <script type="text/javascript" charset="utf-8" src="geomaker.js"></script>
</body>
</html>
