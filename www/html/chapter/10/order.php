<?php

// FormHelper.phpがこのファイルと
// 同じディレクトリにあることを前提とする
require 'FormHelper.php';

// セレクトメニューに選択肢の配列を用意する
// これはdisplay_form()、validate_form()、
// process_form()で必要なので、グローバルスコープで宣言する
$products = [
    'cuke'    => 'Braised Sea Cucumber',
    'stomach' => "Sauteed Pig's Stomach",
    'tripe'   => 'Sauteed Tripe with Wine Sauce',
    'taro'    => 'Stewed Pork with Taro',
    'giblets' => 'Baked Giblets with Salt',
    'abalone' => 'Abalone with Marrow and Duck Feet'
];

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
    global $products;
    $defaults = array();
    // デフォルトとして0から始める
    foreach ($products as $code => $label) {
        $defaults["quantity_$code"] = 0;
    }
    // 数量がセッションにあればそれを使う
    if (isset($_SESSION['quantities'])) {
        foreach ($_SESSION['quantities'] as $field => $quantity) {
            $defaults[$field] = $quantity;
        }
    }
    $form = new FormHelper($defaults);
    // すべてのHTMLとフォーム表示をわかりやすくするため別のファイルに入れる
    include 'order-form.php';
}

function validate_form() {
    global $products;
    $input = array();
    $errors = array();
    // 数量ボックスでは、
    // 値が0以上の有効な整数であることを確認する
    foreach ($products as $code => $name) {
        $field = "quantity_$code";
        $input[$field] = filter_input(INPUT_POST, $field,
        FILTER_VALIDATE_INT,
        ['options' => ['min_range'=>0]]);
        if (is_null($input[$field]) || ($input[$field] === false)) {
            $errors[] = "Please enter a valid quantity for $name.";
        }
    }
    return array($errors, $input);
}

function process_form($input) {
    $_SESSION['quantities'] = $input;
    print "Thank you for your order.";
}
