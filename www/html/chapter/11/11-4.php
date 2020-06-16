<?php

define('NDB_API_KEY','d7zegnakFEEfP3H9xf9BsYppmxUqifgnRfJ6ycrc');

// クエリ文字列ではキーとクエリ用語だけを指定してフォーマットは指定しない
$params = array(
    'api_key' => NDB_API_KEY,
    'q'       => 'black pepper spice 02030'
);
$url = "http://api.nal.usda.gov/ndb/search?" . http_build_query($params);
// オプションはContent-Typeリクエストヘッダに設定する
$options = array('header' => 'Content-Type: application/json');
// 「http」ストリームのコンテキストを作成する
$context = stream_context_create(array('http' => $options));
// file_get_contentsへの第3引数としてコンテキストを渡す
print file_get_contents($url, false, $context);

