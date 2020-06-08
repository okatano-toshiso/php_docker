<?php

/* dechex()を使用する */
function web_color1($red, $green, $blue) {
    $hex = [ dechex($red), dechex($green), dechex($blue) ];
    // 必要に応じて1桁の16進値の先頭に0を付加する
    foreach ($hex as $i => $val) {
        if (strlen($val) === 1) {
            $hex[$i] = "0$val";
        }
    }
    return '#' . implode('', $hex);
}
    /* sprintf()の%xフォーマット文字を利用して
    16進数から10進数への変換を行うこともできる */
function web_color2($red, $green, $blue) {
    return sprintf('#%02x%02x%02x', $red, $green, $blue);
}