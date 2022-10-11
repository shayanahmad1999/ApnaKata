<?php
require 'process/connection.php';

if(isset($_POST['Admin']) && $_POST['Admin'] == 'login'){
$Email = $_POST['email'];
$Password = $_POST['password'];
$query = "select * from tbladmin where adminEmail = '$Email' and adminPassword = '$Password'";
$responce = mysqli_query($connect,$query);
$rows = mysqli_num_rows($responce);
if($rows > 0)
{
 $result = mysqli_fetch_array($responce); 

 $_SESSION['ADMINname'] = $result['adminName'];
 $_SESSION['ADMINid'] = $result['adminId'];
 $_SESSION['ADMINemail'] = $result['adminEmail'];
// print_r($_SESSION); exit;
header('location:home.php?msg=success');
exit();
}
else
{
    header('location:index.php?msg=try to login');
    exit();
}
}

?>
<!DOCTYPE html>
<html lang="en">
<?php require 'include/head.php' ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="index.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            <input type="hidden" name="Admin" value="login" id="">
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
