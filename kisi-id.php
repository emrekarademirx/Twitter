<?php

require_once 'vendor/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

// Twitter API bağlantısının ayarları
define('CONSUMER_KEY', '<your consumer key>');
define('CONSUMER_SECRET', '<your consumer secret>');
define('ACCESS_TOKEN', '<your access token>');
define('ACCESS_TOKEN_SECRET', '<your access token secret>');

// Twitter API bağlantısını oluşturun
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

// Kullanıcı adını veya e-posta adresini kullanarak kullanıcı bilgilerini alın
$user = $connection->get("users/show", ["screen_name" => "<username or email>"]);

// Kullanıcının ID'sini alın
$user_id = $user->id;

echo "Kullanıcı ID: " . $user_id;

?>
