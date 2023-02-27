<?php

require_once("TwitterOAuth.php");

define("CONSUMER_KEY", "your-consumer-key");
define("CONSUMER_SECRET", "your-consumer-secret");
define("ACCESS_TOKEN", "your-access-token");
define("ACCESS_TOKEN_SECRET", "your-access-token-secret");

$toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$following = $toa->get("friendships/lookup", array("screen_name" => "emrekarademir_,emrekarademir34"));

foreach($following as $friendship) {
    if($friendship->connections[0] == "following") {
        echo $friendship->screen_name . " is being followed by the logged in user.\n";
    } else {
        echo $friendship->screen_name . " is not being followed by the logged in user.\n";
    }
}

?>

// Yukarıdaki kod, Twitter API'sine bağlanarak "emrekarademir_" ve "emrekarademir34" kullanıcılarının "giriş yapan kullanıcı" tarafından takip edilip edilmediğini kontrol eder.





