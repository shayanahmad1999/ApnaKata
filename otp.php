<?php
require 'process/connection.php';
if (isset($_POST['verify']) && $_POST['verify'] == 'true') {
    $otp = $_POST['otp'];

    $query = "select * from tbladmin where otp = '$otp'";
    $responce = mysqli_query($connect, $query);
    $rows = mysqli_num_rows($responce);
    if ($rows > 0) {
        $result = mysqli_fetch_array($responce);
        $_SESSION['ADMINname'] = $result['adminName'];
        $_SESSION['ADMINid'] = $result['adminId'];
        $_SESSION['ADMINemail'] = $result['adminEmail'];
        header('location:home.php?msg=success');
        exit();
    } else {
        header('location:otp.php?msg=otp is incorrect');
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
                <p class="login-box-msg">Please Enter OTP</p>

                <form action="./otp.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="otp" class="form-control" placeholder="OTP">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <input type="hidden" name="verify" value="true">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
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