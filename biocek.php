<?php

require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

// Twitter API bağlantı bilgileri
$consumerKey = "your_consumer_key";
$consumerSecret = "your_consumer_secret";
$accessToken = "your_access_token";
$accessTokenSecret = "your_access_token_secret";

// Twitter API'ye bağlan
$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

// Kullanıcı adı
$screenName = "your_screen_name";

// Kullanıcı bilgisi çek
$user = $connection->get("users/show", ["screen_name" => $screenName]);

// Kullanıcının bio bilgisi
$bio = $user->description;

echo "Kullanıcının Bio Bilgisi: " . $bio;

?>

// Lütfen yukarıdaki kodda yer alan "your_consumer_key", "your_consumer_secret", "your_access_token" ve "your_access_token_secret" yerlerini kendi API anahtarınız ile değiştirin. Ayrıca "your_screen_name" yerini de istediğiniz kullanıcı adıyla değiştirin.



