<?php
require "TwitterOAuth.php";

define('CONSUMER_KEY', 'YOUR_CONSUMER_KEY');
define('CONSUMER_SECRET', 'YOUR_CONSUMER_SECRET');
define('ACCESS_TOKEN', 'YOUR_ACCESS_TOKEN');
define('ACCESS_TOKEN_SECRET', 'YOUR_ACCESS_TOKEN_SECRET');

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
$tweet_id = "YOUR_TWEET_ID";

$retweets = $connection->get("statuses/retweets/$tweet_id", ["count" => 100]);

foreach ($retweets as $retweet) {
    $user_id = $retweet->user->id_str;
    $connection->post("friendships/create", ["user_id" => $user_id]);
}

echo "Retweet yapan kullanıcılar takip edildi.";


 // Bu kodu kullanmak için, TwitterOAuth.php kütüphanesini indirmeniz ve Twitter API'ye erişmek için gerekli olan Consumer Key, Consumer Secret, Access Token ve Access Token Secret değerlerini yerine girmeniz gerekmektedir.



