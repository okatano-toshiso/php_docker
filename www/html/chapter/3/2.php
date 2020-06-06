<?php
    $age = 12;
    $shoe_size = 13;
    if($age > $shoe_size) {
        print "message1.";
    } elseif(($shoe_size++)&&($age>20)){
        print "message2.";
    } else {
        print "message3.";
    }
    print "Age:$age. Shoe_size:$shoe_size";