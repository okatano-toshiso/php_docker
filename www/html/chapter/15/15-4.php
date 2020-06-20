<?php
// $_POST['mo']、$_POST['dy']、$_POST['yr']には
// フォームでサブミットされた月番号、日、年
// が含まれる
//
// $_POST['hr']と$_POST['mn']には
// フォームでサブミットされた時と分が含まれる
// $dは現在時刻が含まれるが、
// すぐに上書きされる

$d = new DateTime();
$d->setDate($_POST['yr'], $_POST['mo'], $_POST['dy']);
$d->setTime($_POST['hr'], $_POST['mn']);
print $d->format('r');