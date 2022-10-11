<?php 
require 'process/connection.php';
require 'process/security.php';

$query = "select * from tbladmin";
$response = mysqli_query($connect,$query);

?>
<!DOCTYPE html>
<html lang="en">
<?php require 'include/head.php'; ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php require 'include/navbar.php'; ?>
<?php require 'include/aside.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

              <!-- Content Header (Page header) -->
              <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Admin</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
                  <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <h3 class="card-title font-weight-bold">Record</h3>
                      <?php
                      if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                        echo "<div class='alert alert-success alert-dismissible '>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <a href='#' class='alert-link text text-light'>Record Added Successfully...</a>
                        </div>";
                      } elseif (isset($_GET['msg']) && $_GET['msg'] == 'error') {
                        echo "<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <a href='#' class='alert-link  text text-light'>Record Not Added Please Try again...!</a>
                        </div>";
                      }
                      elseif (isset($_GET['msgs']) && $_GET['msgs'] == 'success') {
                        echo "<div class='alert alert-success alert-dismissible '>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <a href='#' class='alert-link text text-light'>Record Deleted Successfully...</a>
                        </div>";
                      } elseif (isset($_GET['msgs']) && $_GET['msgs'] == 'error') {
                        echo "<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <a href='#' class='alert-link  text text-light'>Record Not Deleted Please Try again...!</a>
                        </div>";
                      }
                      ?>
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4">
                      <a href="addAdmin.php"><button  class="btn btn-outline-info"><i class="fas fa-plus"> Add</i></button></a>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">

                      <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Admin Name</th>
                      <th>Admin Email</th>
                      <th>Admin Password</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $a = 1; 
                      while($result = mysqli_fetch_array($response)){
                    ?>
                    <tr>
                      <td><?php echo $a; ?></td>
                      <td><?php echo $result['adminName']; ?></td>
                      <td><?php echo $result['adminEmail']; ?></td>
                      <td><?php echo md5($result['adminPassword']); ?></td>
                      <td>
                        <a href="process/adminDelete.php?adId=<?php echo$result['adminId']; ?>" onclick="return confirm('are you sure want to delete this record')"><button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button></a>
                      </td>
                    </tr>
                    <?php $a++; } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require 'include/footer.php'; ?>

</body>
</html>
