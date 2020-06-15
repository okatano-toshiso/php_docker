<?php
session_start();
// 注文ページと同じ商品
$products = [
    'cuke' => 'Braised Sea Cucumber',
    'stomach' => "Sauteed Pig's Stomach",
    'tripe' => 'Sauteed Tripe with Wine Sauce',
    'taro' => 'Stewed Pork with Taro',
    'giblets' => 'Baked Giblets with Salt',
    'abalone' => 'Abalone with Marrow and Duck Feet'
];
// フォーム検証のない簡潔なメインページロジック
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    process_form();
} else {
    // フォームがサブミットされなかったので表示する
    show_form();
}

function show_form() {
    global $products;
    // 「フォーム」は1つのサブミットボタンだけなので、
    // ここではFormHelperを使わずにすべてのHTMLをインラインにする
    if (isset($_SESSION['quantities']) && (count($_SESSION['quantities'])>0)) {
        print "<p>Your order:</p><ul>";
        foreach ($_SESSION['quantities'] as $field => $amount) {
            list($junk, $code) = explode('_', $field);
            $product = $products[$code];
            print "<li>$amount $product</li>";
        }
        print "</ul>";
        print '<form method="POST" action=' .
        htmlentities($_SERVER['PHP_SELF']) . '>';
        print '<input type="submit" value="Check Out" />';
        print '</form>';
    } else {
        print "<p>You don't have a saved order.</p>";
    }
    // 注文フォームページが「order.php」に保存されていることを前提とする
    print '<a href="order.php">Return to Order page</a>';
}

function process_form() {
    // セッションからデータを削除する
    unset($_SESSION['quantities']);
    print "<p>Thanks for your order.!!!!!!!!</p>";
}
