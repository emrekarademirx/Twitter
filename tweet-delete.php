<?php

require_once("OAuth.php");

$consumerKey = "3nVuSoBZnx6U4vzUxf5w";
$consumerSecret = "Bcs59EFbbsdF6Sl9Ng71smgStWEGwXXKSjYvPVt7qys";
$accessToken = "ACCESS_TOKEN";
$accessTokenSecret = "ACCESS_TOKEN_SECRET";

$twitter = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

$tweet_id = "TWEET_ID";

$result = $twitter->post("statuses/destroy/$tweet_id");

if ($twitter->getLastHttpCode() == 200) {
    echo "Tweet successfully deleted!";
} else {
    echo "Could not delete tweet. Error: " . $twitter->getLastHttpCode();
}

?>
