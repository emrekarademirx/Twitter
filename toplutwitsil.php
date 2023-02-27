<?php
require_once("twitteroauth.php");

$consumer_key = "3nVuSoBZnx6U4vzUxf5w";
$consumer_secret = "Bcs59EFbbsdF6Sl9Ng71smgStWEGwXXKSjYvPVt7qys";
$access_token = "ACCESS_TOKEN";
$access_token_secret = "ACCESS_TOKEN_SECRET";

$connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);

$count = 200; // max 200
$max_id = -1;
$deleted_count = 0;

while (true) {
    $params = array("count" => $count, "exclude_replies" => true);
    if ($max_id > 0) {
        $params["max_id"] = $max_id;
    }
    $tweets = $connection->get("statuses/user_timeline", $params);

    if (empty($tweets)) {
        break;
    }

    foreach ($tweets as $tweet) {
        $max_id = $tweet->id;
        $connection->post("statuses/destroy/" . $tweet->id);
        $deleted_count++;
    }

    echo "Deleted " . $deleted_count . " tweets\n";
}

echo "Finished deleting tweets\n";
?>
