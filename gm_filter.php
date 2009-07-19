<?php
/*
  GeoMaker by Christian Heilmann (filtering stage)
  Version: 1.0
  Homepage: http://icant.co.uk/geomaker/
  Copyright (c) 2009, Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
?>
<h2>Results</h2>
<?php if(isset($error)) {?>
  
<?php }?>
<?php
  if(isset($message)){
    echo '<input type="hidden" name="message" value="'.$message.'">';
    echo '<h3>Your text</h3><p id="messagedisplay">'.$highlightedmessage.'</p>';
  }
?>

<?php 
  if(isset($table)){
    echo $table['table'];
  }
?>
<?php if(isset($output)){?>
  <input type="hidden" name="rss" value="rss">
  <h3>Feed content</h3>
  <p>Here are the feed items with the locations we've found. Please uncheck what you don't want to add.</p>
<?php echo $output;
  }
?>
<input type="hidden" name="stage" value="output">
<div class="submit">
  <input type="submit" id="send" value="generate">
</div>
