<?php

require_once("OAuth.php");

define("CONSUMER_KEY", "YOUR_CONSUMER_KEY");
define("CONSUMER_SECRET", "YOUR_CONSUMER_SECRET");
define("ACCESS_TOKEN", "YOUR_ACCESS_TOKEN");
define("ACCESS_TOKEN_SECRET", "YOUR_ACCESS_TOKEN_SECRET");

$to = array("user1_screen_name", "user2_screen_name", ...);
$message = "This is a bulk direct message sent using the Twitter API";

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

foreach ($to as $recipient) {
  $connection->post("direct_messages/new", array("screen_name" => $recipient, "text" => $message));
}

?>
