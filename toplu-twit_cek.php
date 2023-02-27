<?php
  require_once('TwitterOAuth.php');
  define('CONSUMER_KEY', 'Your Consumer Key');
  define('CONSUMER_SECRET', 'Your Consumer Secret');
  define('ACCESS_TOKEN', 'Your Access Token');
  define('ACCESS_TOKEN_SECRET', 'Your Access Token Secret');
  
  $twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
  
  $screen_name = 'Your Screen Name';
  $tweets = $twitter->get("statuses/user_timeline", array("screen_name" => $screen_name, "count" => 200));
  
  foreach ($tweets as $tweet) {
    echo $tweet->text . "<br />";
  }
?>
