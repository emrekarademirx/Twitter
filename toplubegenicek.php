<?php
require_once 'twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

// Twitter API bağlantı bilgileri
$consumerKey = "your_consumer_key";
$consumerSecret = "your_consumer_secret";
$accessToken = "your_access_token";
$accessTokenSecret = "your_access_token_secret";

// TwitterOAuth nesnesini oluştur
$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

// Kullanıcının tweet'lerini çek
$tweets = $connection->get("statuses/user_timeline", array("count" => 200, "exclude_replies" => true, "screen_name" => "your_screen_name"));

// Tweet'leri döngü ile gez ve beğenilerini geri çek
foreach ($tweets as $tweet) {
    $connection->post("favorites/destroy", array("id" => $tweet->id));
}

echo "Toplu beğeni geri çekme işlemi tamamlandı.";
