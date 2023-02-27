<?php
 
require_once 'twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
 
define('CONSUMER_KEY', '<your-consumer-key>');
define('CONSUMER_SECRET', '<your-consumer-secret>');
define('ACCESS_TOKEN', '<your-access-token>');
define('ACCESS_TOKEN_SECRET', '<your-access-token-secret>');
 
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
 
$tweetId = <your-tweet-id>;
$likes = $connection->get("favorites/list", ["id" => $tweetId, "count" => 200]);
 
foreach ($likes as $like) {
    $connection->post("friendships/create", ["screen_name" => $like->user->screen_name]);
}
 
?>


// Bu kodu kullanabilmek için twitteroauth adlı bir kütüphane kullanmanız gerekmektedir. İndirme linki: https://github.com/abraham/twitteroauth

Ayrıca, CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ve ACCESS_TOKEN_SECRET değişkenlerini Twitter API anahtarınız ile değiştirmeniz gerekmektedir.
