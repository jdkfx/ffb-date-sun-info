<?php

date_default_timezone_set('Asia/Tokyo');

// 福岡ファッションビルFFBホールの緯度・経度
$latitude = 33.592132;
$longitude = 130.415098;

$timestamp = time();
$sunInfo = date_sun_info($timestamp, $latitude, $longitude);

var_dump($sunInfo);
exit;