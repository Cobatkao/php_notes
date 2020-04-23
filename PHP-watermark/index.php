<?php
include './Watermark.php';

ini_set("display_errors", "On");//打开错误提示
ini_set("error_reporting",E_ALL);//显示所有错误

$water = new WaterMark('./watermark.png');
$water->make('./gao.png', 'output.png', 3);