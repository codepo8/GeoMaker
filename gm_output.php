<?php
/*
  GeoMaker by Christian Heilmann (output stage)
  Version: 1.0
  Homepage: http://icant.co.uk/geomaker/
  Copyright (c) 2009, Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
?>
<?php if(isset($_POST['rss'])){
  include('rssmapcode.php');
}else{
  include('mapcode.php');
}?>
<?php if(isset($_POST['rss'])){?>
  <h3>Your Map code</h3>
  <p>Following is the code to generate the map above. For you to use it in your own products you need to <a href="https://developer.yahoo.com/wsregapp/">apply for a free map developer key</a> and replace the <code>YMAPPID</code> in the code with your own key.</p>
  <textarea><?php include('rssmapcode.php');?></textarea>
<?php }else{?>
<div class="yui-g">
  <div class="yui-u first">
    <h3>Your Map code</h3>
    <p>Following is the code to generate the map above. For you to use it in your own products you need to <a href="https://developer.yahoo.com/wsregapp/">apply for a free map developer key</a> and replace the <code>YMAPPID</code> in the code with your own key.</p>
    <textarea><?php include('mapcode.php');?></textarea>
  </div>
  <div class="yui-u">

    <?php if(!isset($_POST['message'])){?>

    <h3>Your Microformatted locations</h3>
    <p>If all you wanted is geolocate your text, here are the geo-microformats to copy and paste into the correct sections. Notice that we are not using the <code>ABBR</code> pattern as accessibility is something we care about.</p>
    <textarea><?php echo join("\n",$mf);?></textarea>

    <?php } else {?>

    <h3>Your microformatted message</h3>
    <p>Here is your text with geo-microformats to copy and paste. Notice that we are not using the <code>ABBR</code> pattern as accessibility is something we care about. If wanted, simply hide the GEO data with CSS.</p>
    <textarea><?php echo $mfmessage;?></textarea>

    <?php } ?>

  </div>
</div>
<?php }?>

<div class="submit"><input type="submit" value="Start over" id="send"></div>
