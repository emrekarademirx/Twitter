<?php
require_once('OAuth.php');
require_once('TwitterOAuth.php');

define('CONSUMER_KEY', 'your_consumer_key');
define('CONSUMER_SECRET', 'your_consumer_secret');
define('ACCESS_TOKEN', 'your_access_token');
define('ACCESS_TOKEN_SECRET', 'your_access_token_secret');

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$screen_name = 'emrekarademir_'; // Kullanıcının Twitter kullanıcı adı
$friends = $connection->get("friends/list", array("screen_name" => $screen_name, "count" => 200));

foreach ($friends->users as $friend) {
    $connection->post("friendships/create", array("screen_name" => $friend->screen_name));
}

?>
