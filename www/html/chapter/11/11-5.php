<?php

define('NDB_API_KEY','d7zegnakFEEfP3H9xf9BsYppmxUqifgnRfJ6ycrc');

$params = array(
    'api_key' => NDB_API_KEY,
    'q'       => 'black pepper spice 02030'
);

$url = "http://api.nal.usda.gov/ndb/search?" . http_build_query($params);

// POSTで送る2つの変数
$form_data = array('name' => 'black pepper',
'smell' => 'good');
// メソッド、コンテンツタイプ、コンテンツを設定する
$options = array('method' => 'POST',
'header' => 'Content-Type: application/x-www-form-urlencoded',
'content' => http_build_query($form_data));
// 「http」ストリームのコンテキストを作成する
$context = stream_context_create(array('http' => $options));
// file_get_contentsへの第3引数としてコンテキストを渡す
print file_get_contents($url, false, $context);

