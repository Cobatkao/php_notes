<?php
session_start();
include './Captcha.php';

ini_set("display_errors", "On");//打开错误提示
ini_set("error_reporting",E_ALL);//显示所有错误

$handler = new Captcha();
$code = $handler->init();
$_SESSION['captcha'] = $code;