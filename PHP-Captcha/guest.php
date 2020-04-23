<?php
session_start();
if (strtoupper($_POST['inputCaptcha']) == $_SESSION['captcha']) {
  echo '验证码校验成功!';
} else {
  echo '验证码校验失败!';
}