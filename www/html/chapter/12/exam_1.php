<?php
$name = 'Umberto';
function say_hello() {
    print 'Hello, ';
    print $GLOBALS['name'];
}
say_hello();
?>