<?php

    // 出力を表示する代わりに捕捉する
    ob_start();
    // 通常通りにvar_dump()を呼び出す
    var_dump($_POST);
    // ob_start()の呼び出し後に生成された出力を$outputに格納する
    $output = ob_get_contents();
    // 通常の出力表示に戻す
    ob_end_clean();
    // $outputをエラーログに送る
    error_log($output);

