<?php

// クッキーサーバページを取得し、クッキーは送信しない
$c = curl_init('http://localhost:8080/chapter/11/11-12.php');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
// クッキーjarを有効にする
curl_setopt($c, CURLOPT_COOKIEJAR, true);
// 1回目にはクッキーはない
$res = curl_exec($c);
print $res;
// 2回目は最初のリクエストからのクッキーがある
$res = curl_exec($c);
print $res;