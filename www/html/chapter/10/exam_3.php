<?php

// 最初にセッションを開始するので、後で$_SESSIONを自由に使える
session_start();
// フォームヘルパークラスをロードする
require 'FormHelper.php';

$colors = array(
    'ff0000' => 'Red',
    'ffa500' => 'Orange',
    'ffffff' => 'Yellow',
    '008000' => 'Green',
    '0000ff' => 'Blue',
    '4b0082' => 'Indigo',
    '663399' => 'Rebecca Purple'
);
// メインページロジック：
// - フォームがサブミットされたら、検証して処理または再表示を行う
// - サブミットされていなければ、表示する

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // validate_form()がエラーを返したら、エラーをshow_form()に渡す
    list($errors, $input) = validate_form();
    if ($errors) {
        show_form($errors);
    } else {
        // サブミットされたデータが有効なので処理する
        process_form($input);
    }
} else {
    // フォームがサブミットされなかったので表示する
    show_form();
}

function show_form($errors = array()) {
    global $colors;
    // 適切なデフォルトで$formオブジェクトを用意する
    $form = new FormHelper();
    // すべてのHTMLとフォーム表示をわかりやすくするため別のファイルに入れる
    include 'color-form.php';
}

function validate_form() {
    $input = array();
    $errors = array();
    // 有効な色で指定する
    $input['color'] = $_POST['color'] ?? '';
    if (! array_key_exists($input['color'], $GLOBALS['colors'])) {
        $errors[] = 'Please select a valid color.';
    }
    return array($errors, $input);
}

function process_form($input) {
    global $colors;
    $_SESSION['background_color'] = $input['color'];
    print '<p>Your color has been set.</p>';
}
?>
