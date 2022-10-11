<?php
require 'process/connection.php';
require 'process/security.php';

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
                <h1 class="m-0">CIT Kata</h1>
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
                      <h3 class="card-title font-weight-bold">Record</h3><br>
                      <h4 class="card-title">
                        <!--:::::::::::::::::::: SQL QUERIES ::::::::::::::::::::-->
                        <?php
                        if (isset($_GET['table_search'])) {

                          $search = $_GET['table_search'];
                          $query = "SELECT *,(paymentBRTCit + paymentLocalCit) as Total FROM `tblpaymentcit` WHERE paymentDateCit like '%$search%'";
                          $responce = mysqli_query($connect, $query);
                          if ($responce) {
                            $query = "SELECT *,SUM(paymentBRTCit) as totalBRT,SUM(paymentLocalCit) as totalLocal,SUM(paymentBRTCit + paymentLocalCit) as Total FROM `tblpaymentcit`WHERE paymentDateCit like '%$search%'";  
                            $response = mysqli_query($connect, $query);
                            $response = mysqli_query($connect, $query);
                            $result = mysqli_fetch_array($response);
                            echo 'BRT' . ': ' . $result['totalBRT'] . '&nbsp';
                            echo 'Local' . ': ' . $result['totalLocal'] . '&nbsp';
                            echo 'Total' . ': ' . $result['Total'] . '&nbsp';
                          }
                        } else {
                          $query = "SELECT *,(paymentBRTCit + paymentLocalCit) as Total FROM `tblpaymentcit`";
                          $responce = mysqli_query($connect, $query);
                        }

                        ?>
                        <!--:::::::::::::::::::: SQL QUERIES End ::::::::::::::::::::-->
                      <?php
                      if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                        echo "<div class='alert alert-success alert-dismissible '>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <a href='#' class='alert-link text text-light'>Payment Added Successfully...</a>
                        </div>";
                      } elseif (isset($_GET['msg']) && $_GET['msg'] == 'error') {
                        echo "<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <a href='#' class='alert-link  text text-light'>Payment Not Added Please Try again...!</a>
                        </div>";
                      }
                      ?>
                      </h4>
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4">
                      <button data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-info"><i class="fas fa-plus"> Add</i></button>
                      <button data-toggle="modal" data-target="#exampleTotal" class="btn btn-outline-secondary"><i class="fas fa-eye"> View Total</i></button>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                      <form action="" method="get">
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
                      </form>
                    </div>
                  </div>
                </div>
                <div class="container row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                      <h5>Select Rows</h5>
                      <div class="form-group">
                        <!--		Show Numbers Of Rows 		-->
                        <select class="form-control" name="state" id="maxRows">
                          <option value="5000">Show ALL</option>
                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="15">15</option>
                          <option value="20">20</option>
                          <option value="50">50</option>
                          <option value="70">70</option>
                          <option value="100">100</option>
                        </select>
                      </div>
                    </div>
                  </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table id="table-id"  class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>S.NO</th>
                        <th>BRT</th>
                        <th>Local</th>
                        <th>Date</th>
                        <th>Total</th>
                        <!-- <th>Action</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $a = 1;
                      while ($result = mysqli_fetch_array($responce)) {
                      ?>
                        <tr>
                          <td><?php echo $a; ?></td>
                          <td><?php echo $result['paymentBRTCit']; ?></td>
                          <td><?php echo $result['paymentLocalCit']; ?></td>
                          <td><?php echo $result['paymentDateCit']; ?></td>
                          <td><?php echo $result['Total']; ?></td>
                          <td>
                            <!-- <a href="" onclick="return confirm('are you sure want to delete this record')"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a> -->
                          </td>
                        </tr>
                      <?php $a++;
                      } ?>
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

    <!--::::::::::::::::::::::: Modal start ::::::::::::::::::::::::::::::::: -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- ::::::::::::::::: Form Start ::::::::::::::::::::::: -->
            <form class="form-horizontal" action="process/kataInsertionCit.php" method="post">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">BRT Payment</label>
                      <div class="col-sm-10">
                        <input type="text" name="brtpayment" required class="form-control" placeholder="BRT Payment">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Local Payment</label>
                      <div class="col-sm-10">
                        <input type="text" name="localpayment" required class="form-control" placeholder="Local Payment">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Date</label>
                      <div class="col-sm-10">
                        <input type="date" name="paymentdate" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <input type="hidden" name="KATA" value="insert">
              </div>
              <!-- /.card-footer -->
            </form>
            <!-- :::::::::::::::::::::::::::::Form End :::::::::::::::::::::::::::::: -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>
    <!--::::::::::::::::::::::: Modal End ::::::::::::::::::::::::::::::::: -->

        <!--::::::::::::::::::::::: Modal 2 start ::::::::::::::::::::::::::::::::: -->
    <!-- Modal -->
    <div class="modal fade" id="exampleTotal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Total Payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class=" table table-responsive p-0  table-hover text-nowrap">
              <thead>
                <tr>
                <th>BRT Total</th>
                <th>Local Total</th>
                <th>Total</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                    $query = "SELECT *,SUM(paymentBRTCit) as totalBRT,SUM(paymentLocalCit) as totalLocal,SUM(paymentBRTCit + paymentLocalCit) as Total FROM `tblpaymentcit`";
                    $responce = mysqli_query($connect,$query);
                    $result = mysqli_fetch_array($responce);
                  ?>
                <tr>
                  <td><?php echo $result['totalBRT']; ?></td>
                  <td><?php echo $result['totalLocal']; ?></td>
                  <td><?php echo $result['Total']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>
    <!--::::::::::::::::::::::: Modal 2 End ::::::::::::::::::::::::::::::::: -->
    <script>
      getPagination("#table-id");

      function getPagination(table) {
        var lastPage = 1;

        $("#maxRows")
          .on("change", function(evt) {
            //$('.paginationprev').html('');						// reset pagination

            lastPage = 1;
            $(".pagination").find("li").slice(1, -1).remove();
            var trnum = 0; // reset tr counter
            var maxRows = parseInt($(this).val()); // get Max Rows from select option

            if (maxRows == 5000) {
              $(".pagination").hide();
            } else {
              $(".pagination").show();
            }

            var totalRows = $(table + " tbody tr").length; // numbers of rows
            $(table + " tr:gt(0)").each(function() {
              // each TR in  table and not the header
              trnum++; // Start Counter
              if (trnum > maxRows) {
                // if tr number gt maxRows

                $(this).hide(); // fade it out
              }
              if (trnum <= maxRows) {
                $(this).show();
              } // else fade in Important in case if it ..
            }); //  was fade out to fade it in
            if (totalRows > maxRows) {
              // if tr total rows gt max rows option
              var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
              //	numbers of pages
              for (var i = 1; i <= pagenum;) {
                // for each page append pagination li
                $(".pagination #prev")
                  .before(
                    '<li data-page="' +
                    i +
                    '">\
								  <span>' +
                    i++ +
                    '<span class="sr-only">(current)</span></span>\
								</li>'
                  )
                  .show();
              } // end for i
            } // end if row count > max rows
            $('.pagination [data-page="1"]').addClass("active"); // add active class to the first li
            $(".pagination li").on("click", function(evt) {
              // on click each page
              evt.stopImmediatePropagation();
              evt.preventDefault();
              var pageNum = $(this).attr("data-page"); // get it's number

              var maxRows = parseInt($("#maxRows").val()); // get Max Rows from select option

              if (pageNum == "prev") {
                if (lastPage == 1) {
                  return;
                }
                pageNum = --lastPage;
              }
              if (pageNum == "next") {
                if (lastPage == $(".pagination li").length - 2) {
                  return;
                }
                pageNum = ++lastPage;
              }

              lastPage = pageNum;
              var trIndex = 0; // reset tr counter
              $(".pagination li").removeClass("active"); // remove active class from all li
              $('.pagination [data-page="' + lastPage + '"]').addClass("active"); // add active class to the clicked
              // $(this).addClass('active');					// add active class to the clicked
              limitPagging();
              $(table + " tr:gt(0)").each(function() {
                // each tr in table not the header
                trIndex++; // tr index counter
                // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
                if (
                  trIndex > maxRows * pageNum ||
                  trIndex <= maxRows * pageNum - maxRows
                ) {
                  $(this).hide();
                } else {
                  $(this).show();
                } //else fade in
              }); // end of for each tr in table
            }); // end of on click pagination list
            limitPagging();
          })
          .val(5)
          .change();

        // end of on select change

        // END OF PAGINATION
      }
    </script>
</body>

</html>