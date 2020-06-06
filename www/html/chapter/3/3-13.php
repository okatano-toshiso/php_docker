<?php
    $x = "6 pack" <=> "55 card stud";
    if($x>0){
        print 'The String "6 pack" is greater than the string "55 card stud".';
    } elseif($x<0) {
        print 'The String "6 pack" is less than the string "55 card stud".';
    }
    echo "<br />";
    $x = "6 pack" <=> 55;
    if($x>0){
        print 'The String "6 pack" is greater than the number 55.';
    } elseif($x<0) {
        print 'The String "6 pack" is less than the number 55.';
    }

