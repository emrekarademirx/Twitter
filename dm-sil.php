<?php

require_once("TwitterOAuth.php");

define("CONSUMER_KEY", "YOUR_CONSUMER_KEY");
define("CONSUMER_SECRET", "YOUR_CONSUMER_SECRET");
define("ACCESS_TOKEN", "YOUR_ACCESS_TOKEN");
define("ACCESS_TOKEN_SECRET", "YOUR_ACCESS_TOKEN_SECRET");

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

// Tüm DM'leri çek
$dms = $connection->get("direct_messages", ["count" => 200]);

// Her DM'yi tek tek sil
foreach ($dms as $dm) {
    $connection->post("direct_messages/destroy", ["id" => $dm->id]);
}

echo "Tüm DM'ler başarıyla silindi.";

?>
