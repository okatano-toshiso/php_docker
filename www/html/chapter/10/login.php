<?php

define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASSWORD', 'secret');
define('DB_NAME', 'users');


require 'FormHelper.php';
session_start();

if (array_key_exists('username', $_SESSION)) {
    print "Hello, $_SESSION[username].";
} else {
    print 'Howdy, stranger.';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    list($errors, $input) = validate_form();
    if ($errors) {
        show_form($errors);
    } else {
        process_form($input);
    }
} else {
    show_form();
}

function show_form($errors = array()) {
    // 独自のデフォルトはないので、
    // FormHelperコンストラクタには何も渡さない
    $form = new FormHelper();
    // 後に使うエラーHTMLを作成する
    if ($errors) {
        $errorHtml = '<ul><li>';
        $errorHtml .= implode('</li><li>',$errors);
        $errorHtml .= '</li></ul>';
    } else {
        $errorHtml = '';
    }
    // このフォームは小さいので、
    // ここに構成要素を出力する

print <<<_FORM_
<form method="POST" action="{$form->encode($_SERVER['PHP_SELF'])}">
$errorHtml
Username: {$form->input('text', ['name' => 'username'])} <br/>
Password: {$form->input('password', ['name' => 'password'])} <br/>
{$form->input('submit', ['value' => 'Log In'])}
</form>
_FORM_;

}

// function validate_form() {
//     $input = array();
//     $errors = array();
//     // ユーザ名とパスワードのサンプル
//     $users = array(
//         'alice' => 'dog123',
//         'bob' => 'my^pwd',
//         'charlie' => '**fun**'
//     );
//     // ユーザ名が有効であることを確認する
//     $input['username'] = $_POST['username'] ?? '';
//     if (! array_key_exists($input['username'], $users)) {
//         $errors[] = 'Please enter a valid username and password.';
//     } else {
//     // このelse句は無効なユーザ名を入力した場合に
//     // パスワードをチェックしないようにする
//     // パスワードが正しいかどうかを確認する
//         $saved_password = $users[ $input['username'] ];
//         $submitted_password = $_POST['password'] ?? '';
//         if ($saved_password != $submitted_password) {
//             $errors[] = 'Please enter a valid username and password.';
//         }
//     }
//     return array($errors, $input);
// }


// function validate_form() {
//     $input = array();
//     $errors = array();
//     // ハッシュ化したパスワードを持つユーザのサンプル
//     $users = array(
//         'alice'   => '$2y$10$N47IXmT8C.sKUFXs1EBS9uJRuVV8bWxwqubcvNqYP9vcFmlSWEAbq',
//         'bob'     => '$2y$10$qCczYRc7S0llVRESMqUkGeWQT4V4OQ2qkSyhnxO0c.fk.LulKwUwW',
//         'charlie' => '$2y$10$nKfkdviOBONrzZkRq5pAgOCbaTFiFI6O2xFka9yzXpEBRAXMW5mYi'
//     );
//     // ユーザ名が有効であることを確認する
//     if (! array_key_exists($_POST['username'], $users)) {
//         $errors[ ] = '1 Please enter a valid username and password.';
//     }
//     else {
//         // パスワードが正しいかを確認する
//         $saved_password = $users[ $input['username'] ];
//         $submitted_password = $_POST['password'] ?? '';
//         if (! password_verify($submitted_password, $saved_password)) {
//             $errors[ ] = '2 Please enter a valid username and password.';
//         }
//     }
//     return array($errors, $input);
// }


function validate_form() {
    $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8;';
    $db = new PDO($dsn, DB_USER, DB_PASSWORD);
    $input = array();
    $errors = array();
    // これはサブミットされたパスワードが一致した場合のみtrueに設定される
    $password_ok = false;
    $input['username'] = $_POST['username'] ?? '';
    $submitted_password = $_POST['password'] ?? '';
    $stmt = $db->prepare('SELECT password FROM users WHERE username = ?');
    $stmt->execute($input['username']);
    $row = $stmt->fetch();
    // 行がなければ、ユーザ名はどの行とも一致していない
    if ($row) {
        $password_ok = password_verify($submitted_password, $row[0]);
    }
    if (! $password_ok) {
        $errors[] = 'Please enter a valid username and password.';
    }
    return array($errors, $input);
}



function process_form($input) {
    // セッションにユーザ名を追加する
    $_SESSION['username'] = $input['username'];
    print "Welcome, $_SESSION[username]";
}

session_start();
unset($_SESSION['username']);
print 'Bye-bye.';
