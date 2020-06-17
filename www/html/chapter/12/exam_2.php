<?php
function validate_form() {
    $input = array();
    $errors = array();
    // 出力バッファリングを有効にする
    ob_start();
    // サブミットされたデータをすべてダンプする
    var_dump($_POST);
    // 生成された「出力」を取得する
    $output = ob_get_contents();
    // 出力バッファリングを無効にする
    ob_end_clean();
    // 変数ダンプをエラーログに送る
    error_log($output);
    // opは必須
    $input['op'] = $GLOBALS['ops'][$_POST['op']] ?? '';
    if (! in_array($input['op'], $GLOBALS['ops'])) {
    $errors[] = 'Please select a valid operation.';
    }
    // num1とnum2は数値で指定する
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