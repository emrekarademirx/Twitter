<?php
require_once('TwitterOAuth.php');

define('CONSUMER_KEY', 'your_consumer_key');
define('CONSUMER_SECRET', 'your_consumer_secret');
define('ACCESS_TOKEN', 'your_access_token');
define('ACCESS_TOKEN_SECRET', 'your_access_token_secret');

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$username = 'username_to_check';
$user_info = $connection->get("users/show", array("screen_name" => $username));

if ($user_info->verified) {
    echo $username . " is a verified user with a blue tick.";
} else {
    echo $username . " is not a verified user with a blue tick.";
}
?>
