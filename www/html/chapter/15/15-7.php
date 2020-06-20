<?php
$now = new DateTime();
$birthdate = new DateTime('2010-05-12');
$diff = $birthdate->diff($now);
if (($diff->y > 13) && ($diff->invert == 0)) {
print "You are more than 13 years old.";
} else {
print "Sorry, too young.";
}