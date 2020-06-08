<?php
    include "html-img2.php";
    $image_path = "./images/";
    print html_img2('puppy.jpg');
    print html_img2('kitten.jpg','fuzzy');
    print html_img2('dragon.jpg',null,640,480);