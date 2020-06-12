<?php
//日付のチェック

// 6 ヶ月前のDateTimeオブジェクトを作成する
$range_start = new DateTime('6 months ago');
// 現在のDateTimeオブジェクトを作成する
$range_end = new DateTime();
// $_POST['year']には4桁の年が入る
// $_POST['month']には2桁の月が入る
// $_POST['day']には2桁の日が入る
$input['year'] = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT,
array('options' => array('min_range' => 1900,
'max_range' => 2100)));
$input['month'] = filter_input(INPUT_POST, 'month', FILTER_VALIDATE_INT,
array('options' => array('min_range' => 1,
'max_range' => 12)));
$input['day'] = filter_input(INPUT_POST, 'day', FILTER_VALIDATE_INT,
array('options' => array('min_range' => 1,
'max_range' => 31)));
// 0は年、月、日に有効な値ではないので、
// falseとの比較には===を使う必要はない。
// checkdate()は日数が指定の月や年で有効であることを確認する
if ($input['year'] && $input['month'] && $input['day'] &&
checkdate($input['month'], $input['day'], $input['year'])) {
$submitted_date = new DateTime($input['year'].'-'.
$input['month'].'-'.
$input['day']);
if (($range_start > $submitted_date) || ($range_end < $submitted_date)) {
$errors[] = 'Please choose a date less than six months old.';
}
} else {
// フォームパラメータのいずれかを省略した場合や、
// 2月31日などをサブミットしたときに発生する
$errors[] = 'Please enter a valid date.';
}

//メールアドレス構文のチェック
$input['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if (! $input['email']) {
$errors[] = 'Please enter a valid email address';
}

