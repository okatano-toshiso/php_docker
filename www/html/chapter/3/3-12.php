<?php
    $x = strcmp("x54321","x5678");
    if($x>0){
        print 'The String "x54321" is greater than the string "x5678".';
    } elseif($x<0) {
        print 'The String "x54321" is less than the string "x5678".';
    }
    echo "<br />";
    $x = strcmp("54321","5678");
    if($x>0){
        print 'The String "54321" is greater than the string "5678".';
    } elseif($x<0) {
        print 'The String "54321" is less than the string "5678".';
    }
    echo "<br />";
    $x = strcmp("6 pack","55 card stud");
    if($x>0){
        print 'The String "6 pack" is greater than the string "55 card stud".';
    } elseif($x<0) {
        print 'The String "6 pack" is less than the string "55 card stud".';
    }
    echo "<br />";
    $x = strcmp("6 pack",55);
    if($x>0){
        print 'The String "6 pack" is greater than the number 55.';
    } elseif($x<0) {
        print 'The String "6 pack" is less than the number 55.';
    }

