<?php
// 時刻だけを指定すると、年月日には現在の日付を使う
$a = new DateTime('10:36 am');
// 日付だけを指定すると、時分秒には現在の時刻を使う
$b = new DateTime('5/11');
$c = new DateTime('March 5th 2017');
$d = new DateTime('3/10/2018');
$e = new DateTime('2015-03-10 17:34:45');
// DateTimeはミリ秒を理解する
$f = new DateTime('2015-03-10 17:34:45.326425');
// エポックタイムスタンプ＊1には接頭辞@を付けなければいけない
$g = new DateTime('@381718923');
// 一般的なログフォーマット
$h = new DateTime('3/Mar/2015:17:34:45 +0400');
// 相対フォーマット
$i = new DateTime('next Tuesday');
$j = new DateTime("last day of April 2015");
$k = new DateTime("November 1, 2012 + 2 weeks");