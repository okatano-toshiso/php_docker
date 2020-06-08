<?php
function restraunt_check($meal,$tax,$tip):float {
    $tax_amount   = $meal * ($tax/100);
    $tip_amount   = $meal * ($tax/100);
    $total_notip  = $meal + $tax_amount;
    $total_tip    = $meal + $tax_amount + $tip_amount;
    $total_amount = $meal + $tax_amount + $tip_amount;
    return $total_amount;
}
function restraunt_check2($meal,$tax,$tip) {
    $tax_amount   = $meal * ($tax/100);
    $tip_amount   = $meal * ($tax/100);
    $total_notip  = $meal + $tax_amount;
    $total_tip    = $meal + $tax_amount + $tip_amount;
    $total_amount = $meal + $tax_amount + $tip_amount;
    return array($total_notip,$total_tip);
}


$total = restraunt_check(15.22,8.25,15);
print 'I only have $20 in cash, so...<br />';
if($total[0] > 20) {
    print "i must pay with my credit card.<br />";
} else {
    print "i can pay with cash.<br />";
}

$total = restraunt_check2(15.22,8.25,15);
if($total[0] < 20) {
    print "the total without tip is less than $20.<br />";
}
if($total[1] < 20) {
    print "the total with tip is less than $20.<br />";
}

echo $total[0]."<br />";
echo $total[1]."<br />";

function payment_method($cash_on_hand,$amount) {
    if($amount > $cash_on_hand) {
        return 'credit card';
    } else {
        return 'cash';
    }
}

$method = payment_method(20,$total[1]);
print "i will pay with ".$method."<br />";

if(restraunt_check(15.22,8.25,15) < 20){
    print "less than $20,i can pay cash.<br />";
} else {
    print "too expensive,i need my credit card.<br />";
}

function can_pay_cash($cash_on_hand,$amount) {
    if($amount > $cash_on_hand){
        return false;
    } else {
        return true;
    }
}

$total = restraunt_check(15.22,8.25,15);
if(can_pay_cash(20,$total)){
    print "i can pay in cash.<br />";
} else {
    print "time fot credit card.<br />";
}

function complete_bill($meal,$tax,$tip,$cash_on_hand) {
    $tax_amount   = $meal * ($tax/100);
    $tip_amount   = $meal * ($tax/100);
    $total_amount = $meal + $tax_amount + $tip_amount;
    if( $total_amount > $cash_on_hand) {
        return false;
    } else {
        return $total_amount;
    }
}

if($total = complete_bill(15.22,8.25,15,20)){
    print "I'm happy to pay $total.<br />";
} else {
    print "i don't have enough money. shall i wash some dishes?<br />";
}

echo "<br /><hr /><br />";

$dinner = 'Curry Cuttlefish';

function vegetarian_dinner(){
    global $dinner;
    print "Dinner is $dinner , or ";
    $dinner = 'Sauteed Pea Shoots';
    print $dinner;
    print "\n<br />";
}

function kosher_dinner(){
    print "Dinner is $dinner , or ";
    $dinner = 'Kung pao chicken';
    print $dinner;
    print "\n<br />";
}

print "vegetarian";
vegetarian_dinner();
print "kosher";
kosher_dinner();
print "Regular dinner is $dinner.<br />";

$dinner = 'Curry Cuttlefish';
function macrobiotic_dinner() {
    $dinner = "Some Vegetables";
    print "Dinner is $dinner";
    print " but i'd rather have ";
    print $GLOBALS['dinner'];
    print "\n<br />";
}
macrobiotic_dinner();
print "Regular dinner is $dinner.<br />";

function hungry_dinner() {
    $GLOBALS['dinner'] .= ' and Deep-Fried Taro';
}
hungry_dinner();
print "HUngry dinner is $dinner.<br />";

$dinner = 'Curry Cuttlefish';
print "Regular dinner is $dinner.<br />";
vegetarian_dinner();
print "Regular dinner is $dinner.<br />";

echo "<br /><hr /><br />";

function countdown(int $top) {
    while($top > 0) {
        print "$top..";
        $top--;
    }
    print "boom!\n<br />";
}
$counter = 5;
countdown($counter);
print "now, counter is $counter";
//countdown("grunt");
















