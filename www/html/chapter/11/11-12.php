<?php

define('NDB_API_KEY','d7zegnakFEEfP3H9xf9BsYppmxUqifgnRfJ6ycrc');
// クエリ文字列ではキーとクエリ用語だけを指定してフォーマットは指定しない
$params = array('api_key' => NDB_API_KEY,
'q' => 'black pepper');
$url = "http://api.nal.usda.gov/ndb/search?" . http_build_query($params);

// クッキーサーバページを取得し、クッキーは送信しない
$c = curl_init('http://php7.example.com/cookie-server.php');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
// 1回目にはクッキーはない
$res = curl_exec($c);
print $res;
// 2回目もやはりクッキーはない
$res = curl_exec($c);
print $res;