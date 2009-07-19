<?php
  preg_match('/.*\/(.*.php)$/',$_SERVER['PHP_SELF'],$current);
  $current = $current[1];
?>
<ul id="nav">
  <?php if($current !== 'index.php'){?>
    <li><a href="index.php">Home</a></li>
  <?php }else{?>
    <li><strong>Home</strong></li>
  <?php }?>
  <?php if($current !== 'about.php'){?>
    <li><a href="about.php">About</a></li>
  <?php }else{?>
    <li><strong>About</strong></li>
  <?php }?>
  <?php if($current !== 'help.php'){?>
    <li><a href="help.php">Help/Contact</a></li>
  <?php }else{?>
    <li><strong>Help/Contact</strong></li>
  <?php }?>
  <?php if($current !== 'developers.php'){?>
    <li><a href="developers.php">Developers</a></li>
  <?php }else{?>
    <li><strong>Developers</strong></li>
  <?php }?>
</ul>
