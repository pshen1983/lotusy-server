<?php
include_once '../../core/test/case/TestCase.php';
include_once '../../core/test/helper/TestRequestor.php';
include_once '../../core/test/helper/TestRunner.php';

include_once 'case/RegisterAccountTest.php';

$baseUri = 'http://local.account.foodster.club/rest';
$applicationKey = 'E268443E43D93DAB7EBEF303BBE9642F';

$testCases = array(
    0 => new RegisterAccountTest()
);

$inputs = array(
    0 => array(
        'type' => 'facebook',
        'external_ref' => rand(1, 9).time().rand(100, 999),
        'username' => 'John Bob',
        'nickname' => 'jbob',
        'profile_pic' => 'http://www.facebook.com/graph/someone/profile_img.jpg',
        'description' => 'Unit Test Account'
    )
);
?>