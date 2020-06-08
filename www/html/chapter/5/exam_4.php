<?php

function restraunt_check($meal,$tax,$tip) {
    $tax_amount   = $meal * ($tax/100);
    $tip_amount   = $meal * ($tax/100);
    $total_amount = $meal + $tax_amount + $tip_amount;
    return $total_amount;
}

$cash_on_hand = 31;
$meal = 25;
$tax = 10;
$tip = 10;

while(($cost = restraunt_check($meal,$tax,$tip)) < $cash_on_hand) {
    $tip++;
    print "i can afford a tip of $tip% ($cost)\n<br />";
}