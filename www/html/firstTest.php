<?php
// 2017/07/31 tadsanさんにコメント頂き修正(test/bootstrap.phpへ移した)
// require_once 'vendor/autoload.php';
require_once __DIR__ . '/../vendor/autoload.php';

class firstTest extends PHPUnit_Framework_TestCase
{
    public function testMinimumViableTest()
    {
        $this->assertTrue(false, "falseはtrueではない");
    }
}
