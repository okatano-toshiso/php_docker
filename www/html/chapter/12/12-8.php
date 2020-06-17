<?php

function niceExceptionHandler($ex) {
    // ユーザに脅威ではないことを伝える
    print "Sorry! Something unexpected happened. Please try again later.";
    // システム管理者が精査するための詳細情報をロギングする
    error_log("{$ex->getMessage()} in {$ex->getFile()} @ {$ex->getLine()}");
    error_log($ex->getTraceAsString());
}
set_exception_handler('niceExceptionHandler');
print "I'm about to connect to a made up, pretend, broken database!\n";
// PDOコンストラクタに渡すDSNが有効なデータベースや
// 接続パラメータを示していないので、コンストラクタは例外を発行する
$db = new PDO('garbage:this is obviously not going to work!');
print "This is not going to get printed.";
