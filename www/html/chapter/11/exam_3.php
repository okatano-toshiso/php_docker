<?php
// 1970年1月1日から現在までの秒数
$now = time();
setcookie('last_access', $now);

if (isset($_COOKIE['last_access'])) {
    // 1970年以来の秒数値からDateTimeを作成するには、
    // 先頭に@を付ける
    $d = new DateTime('@'. $_COOKIE['last_access']);
    $msg = '<p>You last visited this page at ' .
    $d->format('g:i a') . ' on ' .
    $d->format('F j, Y') . '</p>';
} else {
    $msg = '<p>This is your first visit to this page.</p>';
}
print $msg;