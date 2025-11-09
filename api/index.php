<?php

// 福岡ファッションビルFFBホールの緯度・経度
$latitude = 33.592132;
$longitude = 130.415098;

$now = new DateTimeImmutable('now', new DateTimeZone('Asia/Tokyo'));
$sunInfo = date_sun_info($now->getTimestamp(), $latitude, $longitude);

$sunriseObject = new DateTimeImmutable();
$sunrise = $sunriseObject->setTimestamp($sunInfo['sunrise'])->setTimezone(new DateTimeZone('Asia/Tokyo'));

$sunsetObject = new DateTimeImmutable();
$sunset = $sunsetObject->setTimestamp($sunInfo['sunset'])->setTimezone(new DateTimeZone('Asia/Tokyo'));

if ($now < $sunrise) {
    $progress = 0;
} elseif ($now > $sunset) {
    $progress = 1;
} else {
    $progress = ($now->getTimestamp() - $sunrise->getTimestamp()) /
        ($sunset->getTimestamp() - $sunrise->getTimestamp());
}

$leftCss = "calc(-237px + {$progress} * (100vw + 237px))";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ffb-date-sun-info</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<h1>現在の太陽位置</h1>
<p>日の出：<?= $sunrise->format('H:i') ?> ／ 日の入り：<?= $sunset->format('H:i') ?> ／ 現在時刻：<?= $now->format('H:i') ?></p>
<p>福岡ファッションビルFFBホールの緯度・経度をもとに計算</p>
<h2>進捗率</h2>
<p><?= $progress * 100 ?>%</p>
<div class="sky">
    <img id="php-logo" src="/assets/php.png" alt="php-logo" style="left: <?= $leftCss ?>;">
</div>
</body>
</html>
