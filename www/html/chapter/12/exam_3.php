<?php
function exceptionHandler($ex) {
    // 詳細をエラーログに記録する
    error_log("ERROR: " . $ex->getMessage());
    // ユーザがわかるように概略を出力して
    // 終了する
    die("<p>Sorry, something went wrong.</p>");
}
set_exception_handler('exceptionHandler');
