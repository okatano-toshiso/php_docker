<?php
// FormHelper.phpがこのファイルと
// 同じディレクトリにあることを前提とする
require 'FormHelper.php';
// セレクトメニューに選択肢の配列を用意する
// これはdisplay_form()、validate_form()、
// process_form()で必要なので、グローバルスコープで宣言する
$states = [ 'AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DC', 'DE', 'FL', 'GA',
'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN',
'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK',
'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI',
'WY' ];
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
}
} else {
// フォームがサブミットされなかったので表示する
show_form();
}
function show_form($errors = array()) {
// 適切なデフォルトで$formを用意する
$form = new FormHelper();
// すべてのHTMLとフォーム表示をわかりやすくするため別のファイルに入れる
include 'shipping-form.php';
}

function validate_form() {
    $input = array();
    $errors = array();
    foreach (['from','to'] as $addr) {
    // 必須フィールドを調べる
    foreach (['Name' => 'name', 'Address 1' => 'address1',
    'City' => 'city', 'State' => 'state'] as $label => $field){
    $input[$addr.'_'.$field] = $_POST[$addr.'_'.$field] ?? '';
    if (strlen($input[$addr.'_'.$field]) === 0) {
    $errors[] = "Please enter a value for $addr $label.";
    }
    }
    // 州を調べる
    $input[$addr.'_state'] =
    $GLOBALS['states'][$input[$addr.'_state']] ?? '';
    if (! in_array($input[$addr.'_state'], $GLOBALS['states'])) {
    $errors[] = "Please select a valid $addr state.";
    }
    // 郵便番号を調べる
    $input[$addr.'_zip'] = filter_input(INPUT_POST, $addr.'_zip',
    FILTER_VALIDATE_INT,
    ['options' => ['min_range'=>10000,
    'max_range'=>99999]]);
    if (is_null($input[$addr.'_zip']) || ($input[$addr.'_zip']===false)) {
    $errors[] = "Please enter a valid $addr ZIP";
    }
    // address2を忘れてはいけない
    $input[$addr.'_address2'] = $_POST[$addr.'_address2'] ?? '';
    }
    // height、width、depth、weightはすべて0より大きい数値で指定する
    foreach(['height','width','depth','weight'] as $field) {
    $input[$field] =filter_input(INPUT_POST, $field, FILTER_VALIDATE_FLOAT);
    // 0は有効ではないので、nullや厳密にfalseかではなく
    // 真であるかをテストするだけでよい
    if (! ($input[$field] && ($input[$field] > 0))) {
    $errors[] = "Please enter a valid $field.";
    }
    }
    // 重さを調べる
    if ($input['weight'] > 150) {
    $errors[] = "The package must weigh no more than 150 lbs.";
    }
    // 寸法を調べる
    foreach(['height','width','depth'] as $dim) {
    if ($input[$dim] > 36) {
        $errors[] = "The package $dim must be no more than 36 inches.";
    }
    }
    return array($errors, $input);
    }
    function process_form($input) {
    // レポート用のテンプレートを作成する
    $tpl=<<<HTML
    <p>Your package is {height}" x {width}" x {depth}" and weighs {weight} lbs.</p>
    <p>It is coming from:</p>
    <pre>
    {from_name}
    {from_address}
    {from_city}, {from_state} {from_zip}
    </pre>
    <p>It is going to:</p>
    <pre>
    {to_name}
    {to_address}
    {to_city}, {to_state} {to_zip}
    </pre>
HTML;
    // $inputの住所を出力しやすいように調整する
    foreach(['from','to'] as $addr) {
    $input[$addr.'_address'] = $input[$addr.'_address'];
    if (strlen($input[$addr.'_address2'])) {
    $input[$addr.'_address'].= "\n".$input[$addr.'_address2'];
    }
    }
    // テンプレート変数を対応する$inputの値に置き換える
    $html = $tpl;
    foreach($input as $k => $v) {
    $html = str_replace('{'.$k.'}', $v, $html);
    }
    // レポートを出力する
    print_array($_POST);
    print $html;
    }
function print_array($ar) {
print '<ul>';
foreach ($ar as $k => $v) {
if (is_array($v)) {
print '<li>' . htmlentities($k) .':</li>';
print_array($v);
} else {
print '<li>' . htmlentities($k) .'=' . htmlentities($v) . '</li>';
}
}
print '</ul>';
}
