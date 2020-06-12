<?php
/* これはフォームデータを操作しているので、
$input配列の代わりに$_POSTを直接調べる */
function process_form() {
    print '<ul>';
    foreach ($_POST as $k => $v) {
        print '<li>' . htmlentities($k) .'=' . htmlentities($v) . '</li>';
    }
    print '</ul>';
}