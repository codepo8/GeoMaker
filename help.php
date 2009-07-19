<?php
/*
  GeoMaker by Christian Heilmann (help page)
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
  <title>GeoMaker Help</title>
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/combo?2.7.0/build/reset-fonts-grids/reset-fonts-grids.css&2.7.0/build/base/base-min.css">
  <link rel="stylesheet" type="text/css" href="geomaker.css">
  <script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/yuiloader/yuiloader-min.js"></script> 
</head>
<body class="yui-skin-sam">
<div id="doc" class="yui-t7">
  <div id="hd" role="banner">
    <h1>GeoMaker - Help</h1>
    <?php include('nav.php');?>
  </div>
  <div id="bd" role="main" class="infopage">
    <form action="index.php" method="post">
      <h2>Using GeoMaker</h2>
      <p>The easiest way to explain GeoMaker is with this screencast:</p>
      <object width="480" height="385"><param name="movie" value="http://www.youtube.com/v/YkAAZf7JCjE&hl=en&fs=1&rel=0&color1=0x006699&color2=0x54abd6"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/YkAAZf7JCjE&hl=en&fs=1&rel=0&color1=0x006699&color2=0x54abd6" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="480" height="385"></embed></object>
      <p>In essence, using GeoMaker means going through four steps:</p>
      <ol>
        <li>
          <p>Enter the resource you want to analyse. This could be:</p>
          <ul>
            <li>a web site URL,</li>
            <li>the location of an RSS feed (in which case you also need to tick the "this is an RSS feed" box) or</li>
            <li>a free text.</li>
          </ul>
        </li>
        <li><p>Filter out results that you don't want to have in your final map.</p>
          <ul>
            <li>If you entered a web site URL this is a table of locations with checkboxes.</li>
            <li>If you entered an RSS feed, the feed items are displayed with the locations with checkboxes next to them.</li>
            <li>If you entered a text, the text gets displayed with the locations highlighted above a table of locations with checkboxes.</li>
          </ul>
          <p>In any case, <strong>un-check the locations you don't want to show up in the final map</strong>.</p>
        </li>
        <li>
          <p>Get your results.</p>
          <ul>
            <li>If you entered a web site URL, you will get a map with the location names as markers, the map code to copy and paste into HTML documents and the locations found in the web site as <a href="http://microformats.org/wiki/geo">GEO microformats</a>.</li>
            <li>If you entered an RSS feed location, you will get a map with the feed items as markers and the map code to copy and paste into HTML documents.</li>
            <li>If you entered some text, you will get a map with the location names as markers, the map code to copy and paste into HTML documents and the text with embedded <a href="http://microformats.org/wiki/geo">GEO microformats</a> around the locations you selected.</li>
          </ul>
        </li>
        <li>Enjoy the extreme relaxation, feeling of calm and happiness after successfully creating the output you wanted and turn it into a massive success and profit!</li>
      </ol>
      <h2>Eek, I got an error!</h2>
      <p>Errors can happen, and we hope that we planned for each of them. If you do get a blank page or some very weird error, please contact us, explaining what you did to get this result.</p>
      <h3>Known errors</h3>
      <p>Whilst GeoMaker tries hard to pre-emptively fix things for you, there are some things we cannot fix. These are:</p>
      <ul>
        <li><strong>Files not being found</strong> - just check your URL and also that it is available from outside your computer environment (some URLs need authentication or are behind firewalls).</li>
        <li><strong>RSS feeds not returning</strong> - this happens when the feed contains non UTF-8 characters but claims to be UTF-8. <a href="http://developer.yahoo.com/geo/placemaker/">Placemaker</a>, the technology that makes Geomaker work chokes on those and right now there is no fix for it. HTML documents get filtered though.</li>
        <li><strong>No locations being returned</strong> although you are sure there are some in there. Again, this is a Placemaker problem and it would be great if you could report what you tried to analyse and how it failed on the <a href="http://developer.yahoo.net/forum/index.php?showtopic=2162">GeoMaker forum thread</a>.</li>
        <li><strong>Document too large error</strong>. Placemaker can only convert 50,000 bytes at a time. Whilst GeoMaker tries its best to remove unnecessary content this might still not be enough. Try to cut down on the content to be analyzed or chunk texts up into several parts.</li>
      </ul>
      <h2 id="contact">Other problems? Contact us</h2>
      <p>If you find other problems, please contact us, however as GeoMaker is not our main job don't expect full service.</p>
      <p>The easiest way to reach us is via twitter where I am known as <a href="http://twitter.com/codepo8">@codepo8</a>. You can also <a href="http://developer.yahoo.net/forum/index.php?showtopic=2162">leave a post on the GeoPlanet forums</a> to reach both Chris and the Geo team.</p>
      <div class="submit">
        <input type="submit" id="send" value="Start using GeoMaker">
      </div>
    </form>
  </div>
  <?php include('gm_footer.php');?>
  <script type="text/javascript" charset="utf-8" src="geomaker.js"></script>
</body>
</html>
