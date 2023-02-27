<?php

// Tweet URL'sini belirleyin
$tweet_url = "https://twitter.com/username/status/tweet_id";

// Tweet içeriğini çekin
$tweet_html = file_get_contents($tweet_url);

// Tweet içeriğinde video URL'sini arayın
preg_match('/property="og:video" content="(.*?)"/', $tweet_html, $video_url_matches);

// Video URL'sini alın
$video_url = $video_url_matches[1];

// Video dosyasını indirin
$video_data = file_get_contents($video_url);

// Video dosyasını kaydedin
$video_file = fopen("video.mp4", "w");
fwrite($video_file, $video_data);
fclose($video_file);

?>

// Bu kod, belirttiğiniz tweet URL'sindeki video URL'sini bulacak ve video dosyasını indirecektir. Video dosyası, kodun çalıştığı dizinde "video.mp4" olarak kaydedilecektir.



