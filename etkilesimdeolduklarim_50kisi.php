<?php
require_once('TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "YOUR_ACCESS_TOKEN",
    'oauth_access_token_secret' => "YOUR_ACCESS_TOKEN_SECRET",
    'consumer_key' => "YOUR_CONSUMER_KEY",
    'consumer_secret' => "YOUR_CONSUMER_SECRET"
);

$url = "https://api.twitter.com/1.1/statuses/home_timeline.json";

$requestMethod = "GET";

$getfield = "?count=50";

$twitter = new TwitterAPIExchange($settings);

$response = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

$response = json_decode($response);

$interactions = array();

foreach ($response as $tweet) {
    if (!array_key_exists($tweet->user->screen_name, $interactions)) {
        $interactions[$tweet->user->screen_name] = 0;
    }
    $interactions[$tweet->user->screen_name]++;
}

arsort($interactions);

$mostInteracted = array_slice($interactions, 0, 50, true);

foreach ($mostInteracted as $username => $interactionCount) {
    echo $username . ": " . $interactionCount . "<br>";
}
?>
