<?php
// 存在しない偽装APIエンドポイント
$c = curl_init('http://api.example.com');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($c);
// 成功の成否にかかわらずすべての接続情報を取得する
$info = curl_getinfo($c);
// 接続に何か問題が生じた
if ($result === false) {
print "Error #" . curl_errno($c) . "\n";
print "Uh-oh! cURL says: " . curl_error($c) . "\n";
}
// 400台と500台のHTTPレスポンスコードはエラーを意味する
else if ($info['http_code'] >= 400) {
print "The server says HTTP error {$info['http_code']}.\n";
}
else {
print "A successful result!\n";
}
// リクエスト情報には計時統計データも含まれる
print "By the way, this request took {$info['total_time']} seconds.\n";