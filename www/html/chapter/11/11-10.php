<?php
define('NDB_API_KEY','d7zegnakFEEfP3H9xf9BsYppmxUqifgnRfJ6ycrc');
// クエリ文字列ではキーとクエリ用語だけを指定してフォーマットは指定しない
$params = array('api_key' => NDB_API_KEY,
'q' => 'black pepper');
$url = "http://api.nal.usda.gov/ndb/search?" . http_build_query($params);

// POSTで送信する2つの変数
$form_data = array('name' => 'black pepper',
'smell' => 'good');
$c = curl_init($url);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
// これはPOSTリクエストにすべき
curl_setopt($c, CURLOPT_POST, true);
// これはJSONを含むリクエストである
curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
// これは適切にフォーマットされた送信データである
curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($form_data));
print curl_exec($c);
