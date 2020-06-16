<?php

// クッキーサーバページを取得する
$c = curl_init('http://php7.example.com/cookie-server.php');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
// このプログラムと同じディレクトリの「saved.cookies」ファイルに
// クッキーを保存する
curl_setopt($c, CURLOPT_COOKIEJAR, __DIR__ . '/saved.cookies');
// このディレクトリの「saved.cookies」から
// クッキーを読み込む（以前に保存されている場合）
curl_setopt($c, CURLOPT_COOKIEFILE, __DIR__ . '/saved.cookies');
// このリクエストにはファイルからのクッキーが含まれる（存在する場合）
$res = curl_exec($c);
print $res;

