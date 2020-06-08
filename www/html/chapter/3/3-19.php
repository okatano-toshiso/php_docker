<?php
    print '<select name="doughnuts">';
    for ($min = 1, $max = 10; $min < 50; $min += 10, $max += 10) {
        print "<option>$min - $max</option>\n";
    }
    print '</select><br />';


    $var1 = "Hello";
    $var2 = "hello";
    $check = strcmp($var1, $var2);

    if($check){
        echo $check."is true <br />";
    } else {
        echo "is false <br />";
    }
    if (strcmp($var1, $var2) !== 0) {
        echo '$var1 is not equal to $var2 in a case sensitive string comparison';
    }