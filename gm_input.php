<?php
/*
  GeoMaker by Christian Heilmann (start stage)
  Version: 1.0
  Homepage: http://icant.co.uk/geomaker/
  Copyright (c) 2009, Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
?>
<h2>Get content from web:</h2>

<?php if(isset($error)) {?>
  <p class="error"><?php echo $error;?></p>
<?php }?>

<div id="load">
  <label for="url">Load content from:</label>
  <input type="text" name="url" id="url">
</div>
<div id="rsscheck">
  <input type="checkbox" name="isrss" id="isrss"><label for="isrss"> this is an RSS feed 
  <span class="info">If you provide an RSS feed the output map will show the RSS item instead of the name of the location.</span>
</div>
<h2>or enter some text to analyze:</h2>
<div>
  <label for="message">Text content</label>
  <textarea name="message" id="message"></textarea>
<div>
<input type="hidden" name="stage" value="filter">
<div class="submit">
  <input type="submit" id="send" value="get locations">
</div>


