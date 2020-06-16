<?php
// サポートしたいフォーマット
$formats = array('application/json','text/html','text/plain');
// 指定されなかった場合のレスポンスフォーマット
$default_format = 'application/json';
// レスポンスフォーマットが指定されたか
if (isset($_SERVER['HTTP_ACCEPT'])) {
    // サポートしているフォーマットが指定されたらそれを使う
    if (in_array($_SERVER['HTTP_ACCEPT'], $formats)) {
        $format = $_SERVER['HTTP_ACCEPT'];
    } else {
        // 406は「作成できないフォーマットでのレスポンスをリクエストしている」という意味
        // http_response_code(406);
        // ここで終了するとレスポンスボディはなくなるが、問題ない
        // exit();
    }
} else {
    $format = $default_format;
}

// 時刻を調べる
$response_data = array('now' => time());
// 送信するコンテンツの種類をクライアントに伝える
header("Content-Type: $format");
// フォーマットに適した方法で時刻を出力する
if ($format == 'application/json') {
    print json_encode($response_data);
}
else if ($format == 'text/html') {

?>
    <!doctype html>
    <html>
    <head><title>Clock</title></head>
    <body><time><?= date('c', $response_data['now']) ?></time></body>
    </html>

<?php
    } else if ($format == 'text/plain') {
        print $response_data['now'];
    }
?>
