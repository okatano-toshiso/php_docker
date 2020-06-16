<?php
$c = curl_init('http://numbersapi.com/09/27');

// レスポンスコンテンツをすぐに出力するのではなく
// 文字列として返すようにcURLに通知する
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
// リクエストを実行する
$fact = curl_exec($c);

// echo var_dump($fact);

?>
Did you know that <?php echo $fact; ?>