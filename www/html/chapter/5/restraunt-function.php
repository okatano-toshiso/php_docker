<?php

function restraunt_check($meal,$tax,$tip):float {
    $tax_amount   = $meal * ($tax/100);
    $tip_amount   = $meal * ($tax/100);
    $total_notip  = $meal + $tax_amount;
    $total_tip    = $meal + $tax_amount + $tip_amount;
    $total_amount = $meal + $tax_amount + $tip_amount;
    return $total_amount;
}
function payment_method($cash_on_hand,$amount) {
    if($amount > $cash_on_hand) {
        return 'credit card';
    } else {
        return 'cash';
    }
}
