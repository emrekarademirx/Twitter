<?php

require_once("OAuth.php");
require_once("TwitterOAuth.php");

define("CONSUMER_KEY", "your_consumer_key");
define("CONSUMER_SECRET", "your_consumer_secret");
define("ACCESS_TOKEN", "your_access_token");
define("ACCESS_TOKEN_SECRET", "your_access_token_secret");

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$friends = $connection->get("friends/ids");
$followers = $connection->get("followers/ids");

$unfollow = array_diff($friends->ids, $followers->ids);

foreach ($unfollow as $id) {
  $connection->post("friendships/destroy", ["user_id" => $id]);
}

?>
