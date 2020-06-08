<?php
require 'restraunt-function.php';

$total_bill = restraunt_check(15.22,8.25,15);

$cash = 30;

print "i need to pay with ".payment_method($cash,$total_bill);