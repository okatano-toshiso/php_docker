<?php
// FormHelper.phpがこのファイルと
// 同じディレクトリにあることを前提とする
require 'FormHelper.php';
// セレクトメニューに選択肢の配列を用意する
// これはdisplay_form()、validate_form()、
// process_form()で必要なので、グローバルスコープで宣言する
$ops = array('+','-','*','/');
// メインページのロジック：
// - フォームがサブミットされたら、検証して処理するかまたは再表示する
// - サブミットされなかったら表示する
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// validate_form()がエラーを返したら、エラーをshow_form()に渡す
list($errors, $input) = validate_form();
if ($errors) {
show_form($errors);
} else {
// サブミットされたデータが有効なので処理する
process_form($input);
// そして、フォームを再び表示して別の計算を行う
show_form();
}
} else {
// フォームがサブミットされなかったので表示する
show_form();
}
function show_form($errors = array()) {
$defaults = array('num1' => 2,
'op' => 2, // $opsの「*」のインデックス
'num2' => 8);
// 適切なデフォルトで$formを用意する
$form = new FormHelper($defaults);
// すべてのHTMLとフォーム表示をわかりやすくするため別のファイルに入れる
include 'math-form.php';
}
function validate_form() {
$input = array();
$errors = array();
// opは必須
$input['op'] = $GLOBALS['ops'][$_POST['op']] ?? '';
if (! in_array($input['op'], $GLOBALS['ops'])) {
$errors[] = 'Please select a valid operation.';
}
// num1とnum2には数値を指定する
$input['num1'] = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
if (is_null($input['num1']) || ($input['num1'] === false)) {
$errors[] = 'Please enter a valid first number.';
}
$input['num2'] = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
if (is_null($input['num2']) || ($input['num2'] === false)) {
$errors[] = 'Please enter a valid second number.';
}
// ゼロでは割れない
if (($input['op'] === '/') && ($input['num2'] === 0)) {
$errors[] = 'Division by zero is not allowed.';
}
return array($errors, $input);
}
function process_form($input) {
    $result = 0;
    if ($input['op'] === '+') {
    $result = $input['num1'] + $input['num2'];
    }
    else if ($input['op'] === '-') {
    $result = $input['num1'] - $input['num2'];
    }
    else if ($input['op'] === '*') {
    $result = $input['num1'] * $input['num2'];
    }
    else if ($input['op'] === '/') {
    $result = $input['num1'] / $input['num2'];
    }
    $message = "{$input['num1']} {$input['op']} {$input['num2']} = $result";
    print "<h3>$message</h3>";
    }
    ?>