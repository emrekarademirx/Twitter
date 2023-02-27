<?php

require_once("twitteroauth.php");

define("CONSUMER_KEY", "your_consumer_key");
define("CONSUMER_SECRET", "your_consumer_secret");
define("OAUTH_TOKEN", "your_oauth_token");
define("OAUTH_SECRET", "your_oauth_secret");

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_SECRET);

$content = $connection->get("account/verify_credentials");

$user_id = $content->id;

$stream = $connection->stream("user", array("user_id" => $user_id));

$stream->on("event", function($event) use ($connection) {
    if ($event->event === "favorite") {
        $favorited_tweet = $event->target_object;
        if ($favorited_tweet->user->screen_name === "emrekarademir_") {
            $message = "emrekarademir_ just tweeted: " . $favorited_tweet->text;
            // send notification with $message
        }
    }
});

$stream->start();

