<?php
$json = file_get_contents("http://php.net/releases/?json");
if ($json === false) {
    print "Can't retrieve feed.";
}
else {
    $feed = json_decode($json, true);
    // $feedはトップレベルキーがメジャーリリース番号の配列である
    // まず最大の番号を取得する必要がある
    $major_numbers = array_keys($feed);
    rsort($major_numbers);
    $biggest_major_number = $major_numbers[0];
    // この配列のメジャー番号キーの「version」要素が
    // そのメジャーバージョン番号の最新リリースである
    $version = $feed[$biggest_major_number]['version'];
    print "The latest version of PHP released is $version.";
}