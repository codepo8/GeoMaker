
<?php
if($_POST['test']=='foo'){
  echo '<p><strong>It worked! It worked! Igor, fetch me a brain!</strong></p>';
}
if(!preg_match('/icant/',$_SERVER['HTTP_HOST'])){
  echo '<h1>Testing...</h1>';
  echo '<p>Trying to post some content and such...</p>';
  $apiendpoint = 'http://icant.co.uk/geomaker/test.php';
  $post = 'test=foo';
  $ch = curl_init($apiendpoint);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $results = curl_exec($ch);
  curl_close($ch);
  echo $results;
  echo '<p>Trying to do some XML stuff, below you should see an object representation.</p>';
  $xml = simplexml_load_string('<starwars><chewie>Huurrrrrrrrrrr</chewie><hansolo>I know!</hansolo><leia>Aren\'t you a little small for an XML file?</leia></starwars>');
  echo '<pre>';
  print_r($xml);
  echo '</pre>';
  echo '<p>Has it worked? If so, Mazeltov, get <a href="index.php">get GeoMaking</a>.</p>';
}
?>