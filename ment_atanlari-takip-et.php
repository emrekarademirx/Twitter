<?php
  require_once 'OAuth.php';
  require_once 'twitteroauth.php';

  // Twitter API bağlantı bilgileri
  $consumerKey = 'your-consumer-key';
  $consumerSecret = 'your-consumer-secret';
  $accessToken = 'your-access-token';
  $accessTokenSecret = 'your-access-token-secret';
  
  $username = 'username'; // Takip edilmek istenen kullanıcı adı
  $tweetId = 1234567890; // Ment atılan tweetin ID'si

  // Twitter API bağlantısının oluşturulması
  $connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

  // Tweet'e yapılan menşajları çekme
  $tweet = $connection->get("statuses/show/{$tweetId}");

  // Tweet'e yapılan menşajların dolaşılması
  foreach ($tweet->entities->user_mentions as $mention) {
    // Menşaj atan kullanıcının takip edilmesi
    $connection->post("friendships/create", array("screen_name" => $mention->screen_name));
  }
?>


// Bu kodu kullanmak için OAuth.php ve twitteroauth.php dosyalarının kodun içinde belirtilen dizinlere yüklenmiş olması gerekmektedir. Ayrıca, Twitter API bağlantı bilgilerinin $consumerKey, $consumerSecret, $accessToken ve $accessTokenSecret değişkenlerine güncellenmesi gerekmektedir.



