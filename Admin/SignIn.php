<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witthayawiphat : เข้าสู่ระบบ</title>
    <link rel="stylesheet" href="CSS/SignIn.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body class="text-center">
    <main class="form-signin">
      <form method="post" action="SignIn_Func/Signin_Func.php">
        <h1 class="h3 mb-3 fw-normal">เข้าสู่ระบบ</h1>
          <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="U_Email" id="U_Email" required>
            <label for="floatingInput">อีเมล :</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="U_Password" id="U_Password" required>
            <label for="floatingPassword">รหัสผ่าน :</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="Login_btn" id="Login_btn">เข้าสู่ระบบ</button>
        <p class="mt-5 mb-3 text-muted">Copyright © 2021 Khon Kaen University, All rights reserved.</p>
      </form>
    </main>
</body>
</html>