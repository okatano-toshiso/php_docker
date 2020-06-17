<?php
$prices = array(5.95, 3.00, 12.50);
$total_price = 0;
$tax_rate = 1.08; // 税金8%
foreach ($prices as $price) {
$total_price += $price * $tax_rate;
}
printf('Total price (with tax): $%.2f', $total_price);