<?php
setcookie('userid','ralph');
print 'Hello, ' . $_COOKIE['userid'];
?>
<html>
    <head>
        <title>Page with cookies</title>
    <head>
    <body>
        This page sets a cookie properly, because the PHP block<br />
        with setcookie() in it comes before all of the HTML.
    </body>
</html>


<?php
// session_start();
if (isset($_SESSION['count'])) {
$_SESSION['count'] = $_SESSION['count'] + 1;
} else {
$_SESSION['count'] = 1;
}
print "You've looked at this page " . $_SESSION['count'] . ' times.';
?>
<hr />


<html><head><title>Page with cookies</title><head>
<body>
This page sets a cookie properly, because the PHP block
with setcookie() in it comes before all of the HTML.
</body></html>