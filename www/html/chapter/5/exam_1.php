<?php
    function image_back($url,$alt,$width,$height) {
        $img_tag =  '<img src="'.$url.'" alt = "'.$alt.'" width='.$width.' height='.$height.' />';
        return $img_tag;
    }

    $result = image_back("https://pbs.twimg.com/media/EZ92Pn_UYAAqWyH?format=jpg&name=small","test",600,600);
    echo $result;