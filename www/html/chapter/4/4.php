<?php
echo "test";
/* クラスの学生の成績とID番号：
キーが学生名であり、
値が成績とID番号の連想配列である連想配列
*/
$students = [ "James D. McCawley" => [ 'grade' => 'A+','id' => 271231 ],
'Buwei Yang Chao' => [ 'grade' => 'A', 'id' => 818211] ];
/* 店の在庫の各商品の数：
キーが商品名であり、
値が在庫数である連想配列
*/
$inventory = [ 'Wok' => 5, 'Steamer' => 3, 'Heavy Cleaver' => 3,
'Light Cleaver' => 0 ];
/* 1週間の給食－
食事内容（前菜、副菜、飲み物など）と1日の費用：
キーが曜日であり、値が食事を表す連想配列である連想配列。
この連想配列は費用に関するキーと値のペアと
食事内容に関するキーと値のペアを持つ。
*/
$lunches = [ 'Monday' => [ 'cost' => 1.50,
'entree' => 'Beef Shu-Mai',
'side' => 'Salty Fried Cake',
'drink' => 'Black Tea' ],
'Tuesday' => [ 'cost' => 2.50,
'entree' => 'Clear-steamed Fish',
'side' => 'Turnip Cake',
'drink' => 'Bubble Tea' ],
'Wednesday' => [ 'cost' => 2.00,
'entree' => 'Braised Sea Cucumber','side' => 'Turnip Cake',
'drink' => 'Green Tea' ],
'Thursday' => [ 'cost' => 1.35,
'entree' => 'Stir-fried Two Winters',
'side' => 'Egg Puff',
'drink' => 'Black Tea' ],
'Friday' => [ 'cost' => 3.25,
'entree' => 'Stewed Pork with Taro',
'side' => 'Duck Feet',
'drink' => 'Jasmine Tea' ] ];
/* あなたの家族の名前：
インデックスが暗黙的であり、
値が家族の名前である数値配列
*/
$family = [ 'Bart', 'Lisa', 'Homer', 'Marge', 'Maggie' ];
/* あなたの家族の名前、年齢、続柄：
キーが家族の名前であり、
値が年齢と続柄に関するキーと値のペアの連想配列
*/
$family = [ 'Bart' => [ 'age' => 10,
'relation' => 'brother' ],
'Lisa' => [ 'age' => 7,
'relation' => 'sister' ],
'Homer' => [ 'age' => 36,
'relation' => 'father' ],
'Marge' => [ 'age' => 34,
'relation' => 'mother' ],
'Maggie' => [ 'age' => 1,
'relation' => 'self' ] ];