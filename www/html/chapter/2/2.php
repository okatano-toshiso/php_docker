<?php
$hamburger = 4.95;
$chocolate_milk_shake = 1.95;
$cola = 0.85;
$tax_rate = 0.075;
$tip_rate = 0.16;

$amount = $hamburger*2 + $chocolate_milk_shake + $cola;
$tax = $amount* $tax_rate;
$tip = $amount* $tip_rate;

$sum = $amount + $tax + $tip;
echo $sum."$";
