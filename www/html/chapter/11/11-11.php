<?php
// クッキーがあればクッキーで送信された値を使い、クッキーが提供されなければ0を使う
$value = $_COOKIE['c'] ?? 0;
// 値を1増やす
$value++;
// レスポンスに新しいクッキーを設定する
setcookie('c', $value);
// クッキーの内容をユーザに伝える
print "Cookies: " . count($_COOKIE) . "\n";
foreach ($_COOKIE as $k => $v) {
print "$k: $v\n";
}