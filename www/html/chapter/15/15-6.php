<?php
$daysToPrint = 4;
$d = new DateTime('next Tuesday');
print "<select name='day'>\n";
for ($i = 0; $i < $daysToPrint; $i++) {
print " <option>" . $d->format('l F jS') . "</option>\n";
// 日付に2日を加える
$d->modify("+2 day");
}
print "</select>";