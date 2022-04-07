<?php
require_once("../_config.php");
$title = "เข้าสู่ระบบ";

?>
<a href="../index.php"><button type="button" class="btn-close" aria-label="Close" style="float: right; margin: 2%"></button></a>
<?php require_once("_header.php"); ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h1 class="text-center mb-4"><?php echo $title; ?></h1>
          <div id="message"></div>
          <form id="form" method=post action="../_function.php">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="U_Email" required>
              <label for="floatingInput">อีเมล :</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="U_Password" required>
              <label for="floatingPassword">รหัสผ่าน :</label>
            </div>
            <button type="submit" class="btn btn-primary btn-lg mt-2 w-100" name="login_btn">เข้าสู่ระบบ</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once("_footer.php"); ?>