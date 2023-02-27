<?php

require_once('OAuth.php');
require_once('TwitterOAuth.php');

define('CONSUMER_KEY', 'YOUR_CONSUMER_KEY');
define('CONSUMER_SECRET', 'YOUR_CONSUMER_SECRET');
define('ACCESS_TOKEN', 'YOUR_ACCESS_TOKEN');
define('ACCESS_TOKEN_SECRET', 'YOUR_ACCESS_TOKEN_SECRET');

$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$today = strtotime('today midnight');

$likes = 0;
$retweets = 0;

$likesTimeline = $twitter->get("favorites/list", ["count" => 200]);
foreach ($likesTimeline as $like) {
  if (strtotime($like->created_at) >= $today) {
    $likes++;
  }
}

$retweetsTimeline = $twitter->get("statuses/retweets_of_me", ["count" => 200]);
foreach ($retweetsTimeline as $retweet) {
  if (strtotime($retweet->created_at) >= $today) {
    $retweets++;
  }
}

echo "Bugün " . $likes . " tweet beğendiniz ve " . $retweets . " tweet RT yaptınız.";

?>

// Bu kod, TwitterOAuth ve OAuth kütüphanelerini kullanır. Kullanıcının Twitter API anahtar bilgilerini CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ve ACCESS_TOKEN_SECRET değişkenlerine tanımlaması gerekir. Sonrasında, kod bugün saat 00:00:00'dan itibaren kullanıcının beğendiği ve RT yaptığı tweetlerin sayısını hesaplar ve sonuçları ekranda görüntüler.



