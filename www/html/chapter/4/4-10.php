<?php
    $meals = array(
        'Walnut Bun' => 1,
        'Cashew Nuts and White Mushrooms' => 4.95,
        'Dried Mulberries' => 3.00,
        'Eggplant with Chili Source' => 6.50
    );

    echo "<pre>";
    echo var_dump($meals);
    echo "</pre>";

    foreach ($meals as $dish => $price) {
        $meals[$dish] = $meals[$dish]*2;
    }

    echo "<pre>";
    echo var_dump($meals);
    echo "</pre>";

    foreach ($meals as $dish => $price) {
        printf("The new price of %s is \$%.2f.\n<br />",$dish,$price);
    }