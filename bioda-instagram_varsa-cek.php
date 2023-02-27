<?php

// Twitter API kullanmak için gerekli olan kimlik doğrulama bilgilerini yerleştirin
$consumerKey = "your_consumer_key";
$consumerSecret = "your_consumer_secret";
$accessToken = "your_access_token";
$accessTokenSecret = "your_access_token_secret";

// TwitterOAuth sınıfını yükleyin
require_once "TwitterOAuth.php";

// TwitterOAuth nesnesi oluşturun
$twitter = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

// Twitter API'sinde arama yapmak için "search/tweets" metodunu çağırın
$query = "bio:instagram";
$results = $twitter->get("search/tweets", array("q" => $query, "count" => 100));

// Sonuçları listeleyin
foreach ($results->statuses as $status) {
    echo $status->user->screen_name . ": " . $status->user->description . "\n";
}

?>

// Bu kod, Twitter API'sinde "instagram" kelimesini içeren bio verilerine sahip kullanıcıların ilk 100 tanesini listeleyebilir. Ancak, Twitter API'sinin bir sorgu sınırı bulunmaktadır ve belirli bir süre içinde yalnızca belirli sayıda istek yapabilirsiniz.



