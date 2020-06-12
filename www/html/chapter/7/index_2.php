<?php
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    print "Hello, ". $_POST['my_name'];
} else {
    print<<<_HTML_

<form method="post" action="$_SERVER[PHP_SELF]">
    Your name: <input type="text" name="my_name" ><br>
    <input type="submit" value="Say Hello">
</form>
_HTML_;
}

// リクエストメソッドに応じて
// 適切な処理を行うロジック
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (validate_form()) {
        process_form();
    } else {
        show_form();
    }
} else {
    show_form();
}
// フォームのサブミット時に何かを行う
function process_form() {
    print "Hello, ". $_POST['my_name'];
}

// フォームを表示する
function show_form() {
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
// my_nameが少なくとも3文字であるかを調べる
    if (strlen($_POST['my_name']) < 3) {
        return false;
    } else {
        return true;
    }
}
