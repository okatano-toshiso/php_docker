<?php

// リクエストメソッドに応じて
// 適切な処理を行うロジック
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // validate_form()がエラーを返したらshow_form()に渡す
    if ($form_errors = validate_form()) {
        show_form($form_errors);
    } else {
        process_form();
    }
} else {
    show_form();
}
// フォームのサブミット時に何かを行う
function process_form() {
    print "Hello, ". $_POST['my_name'];
}

// フォームを表示する
function show_form($errors = '') {
// エラーが渡されたらそのエラーを出力する
    if ($errors) {
        print 'Please correct these errors: <ul><li>';
        print implode('</li><li>', $errors);
        print '</li></ul>';
    }
    print<<<_HTML_
<form method="POST" action="$_SERVER[PHP_SELF]">
Your name: <input type="text" name="my_name">
<br/>
<input type="submit" value="Say Hello">
</form>
_HTML_;
}

// フォームデータをチェックする
function validate_form() {
    // エラーメッセージを空の配列で初期化
    $errors = array();
    // 名前が短すぎる場合にはエラーメッセージを追加する
    if (strlen($_POST['my_name']) < 3) {
        $errors[] = 'Your name must be at least 3 letters long.';
    }
    // エラーメッセージの配列（場合によっては空の配列）を返す
    return $errors;
}