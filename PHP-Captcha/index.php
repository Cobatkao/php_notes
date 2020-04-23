<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>captcha example</title>
  <style>
    form {
      display: flex;
      align-items: center;
    }
    form > * {
      margin-right: 5px;
    }
    .btn {
      padding: 5px;
      border: 1px solid #555;
    }
    input {
      padding: 5px;
      border: none;
      outline: none;
      border-bottom: 1px solid #FDAB0E;
    }
  </style>
</head>
<body>
  <form action="./guest.php" method="POST">
    <input type="text" name="inputCaptcha">
    <img src="./code.php" alt="验证码" onclick = "this.src = 'code.php?' + Math.random()*100">
    <button class="btn">提交</button>
  </form>
</body>
</html>