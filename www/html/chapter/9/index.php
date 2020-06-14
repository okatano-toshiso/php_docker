<?php

    // // 上記の例からテンプレートファイルを読み込む
    // $page = file_get_contents('page-template.html');
    // // ページのタイトルを挿入する
    // $page = str_replace('{page_title}', 'Welcome', $page);
    // // ページの色を午後は青、
    // // 午前は緑にする
    // if (date('H') >= 12) {
    //     $page = str_replace('{color}', 'blue', $page);
    // } else {
    //     $page = str_replace('{color}', 'green', $page);
    // }
    // // 以前に保存したセッション変数から
    // // ユーザ名を取得する
    // $page = str_replace('{name}', $_SESSION['username'], $page);
    // // 結果を出力する
    // print $page;

    // foreach (file('people.txt') as $line) {
    //     $line = trim($line);
    //     $info = explode('|', $line);
    //     print '<li><a href="mailto:' . $info[0] . '">' . $info[1] ."</li>\n";
    // }

    // $fh = fopen('people.txt','rb');
    // while ((! feof($fh)) && ($line = fgets($fh))) {
    //     $line = trim($line);
    //     $info = explode('|', $line);
    //     print '<li><a href="mailto:' . $info[0] . '">' . $info[1] ."</li>\n";
    // }
    // fclose($fh);
    // try {
    //     $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8;';
    //     $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     print('接続しました。');
    // }
    // catch(PDOException $e){
    //     print('ERROR:'.$e->getMessage());
    //     exit;
    // }
    // try {
    //     $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8;';
    //     $db = new PDO($dsn, DB_USER, DB_PASSWORD);
    // } catch (Exception $e) {
    //     print "Couldn't connect to database: " . $e->getMessage();
    // exit();
    // }
    // // 書き込みのためにdishes.txtを開く
    // $fh = fopen('dishes.txt','wb');
    // $q = $db->query("SELECT dish_name, price FROM dishes");
    // while($row = $q->fetch()) {
    //     // 各行（末尾の改行を含む）を
    //     // dishes.txtに書き込む
    //     fwrite($fh, "The price of $row[0] is $row[1] \n");
    // }
    // fclose($fh);
    // fwrite();
    // try {
    //     $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8;';
    //     $db = new PDO($dsn, DB_USER, DB_PASSWORD);
    //     // $db = new PDO('sqlite:/tmp/restaurant.db');
    // } catch (Exception $e) {
    //     print "Couldn't connect to database: " . $e->getMessage();
    //     exit();
    // }
    // $fh = fopen('dishes.csv','rb');
    // $stmt = $db->prepare('INSERT INTO dishes (dish_name, price, is_spicy)
    // VALUES (?,?,?)');
    // while ((! feof($fh)) && ($info = fgetcsv($fh))) {
    //     // $info[0]は料理名（dishes.csvの行の最初のフィールド）
    //     // $info[1]は値段（2番目のフィールド）
    //     // $info[2]は辛さ（3番目のフィールド）
    //     // データベーステーブルに行を挿入する
    //     $stmt->execute($info);
    //     print "Inserted $info[0]\n";
    // }
    // // ファイルを閉じる
    // fclose($fh);
    // // 書き込みのためのCSVファイルを開く
    // $fh = fopen('dish-list.csv','wb');
    // $dishes = $db->query('SELECT dish_name, price, is_spicy FROM dishes');
    // while ($row = $dishes->fetch(PDO::FETCH_NUM)) {
    //     // $rowのデータをCSVフォーマット文字列として書き込む
    //     // fputcsv()が末尾に改行を追加する
    //     fputcsv($fh, $row);
    // }
    // fclose($fh);



    // // 「dishes.csv」というCSVファイルが送られてくることをWebクライアントに通知する
    // header('Content-Type: text/csv');
    // header('Content-Disposition: attachment; filename="dishes.csv"');
    // // 出力ストリームへのファイルハンドルを開く
    // $fh = fopen('php://output','wb');
    // // データベーステーブルから情報を取得して出力する
    // $dishes = $db->query('SELECT dish_name, price, is_spicy FROM dishes');
    // while ($row = $dishes->fetch(PDO::FETCH_NUM)) {
    //     fputcsv($fh, $row);
    // }

    // $template_file = 'page-template.html';
    // if (is_readable($template_file)) {
    //     print "read template file.";
    //     $template = file_get_contents($template_file);
    // } else {
    //     print "Can't read template file.";
    // }

define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASSWORD', 'secret');
define('DB_NAME', 'test');

try {
    $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8;';
    $db = new PDO($dsn, DB_USER, DB_PASSWORD);
} catch (Exception $e) {
    print "Couldn't connect to database: " . $e->getMessage();
    exit();
}
// 書き込みのためのdishes.txtを開く
$fh = fopen('/usr/local/dishes.txt','wb');
if (! $fh) {
    print "Error opening dishes.txt: $php_errormsg";
} else {
    $q = $db->query("SELECT dish_name, price FROM dishes");
    while($row = $q->fetch()) {
        // 各行（末尾の改行を含む）を
        // dishes.txtに書き込む
        fwrite($fh, "The price of $row[0] is $row[1] \n");
    }
    if (! fclose($fh)) {
        print "Error closing dishes.txt: $php_errormsg";
    }
}

$fh = fopen('people.txt','rb');
if (! $fh) {
    print "Error opening people.txt: $php_errormsg";
} else {
    while (! feof($fh)) {
        $line = fgets($fh);
        if ($line !== false) {
            $line = trim($line);
            $info = explode('|', $line);
            print '<li><a href="mailto:' . $info[0] . '">' . $info[1] ."</li>\n";
        }
    }
    if (! fclose($fh)) {
        print "Error closing people.txt: $php_errormsg";
    }
}