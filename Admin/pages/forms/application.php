<?php

  include '../../../database.php';  
  $data = new Databases;  
  // Get
  // Insert


  $status = 0;
  $c = array('status'=>$status);
  $count = $data->getData('application','*',$c);
  print_r(count($count));



  
   
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>
  <!--  -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <!--  -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
   <?php

  include('include/navbar.php');

  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
    include("include/sidebar.php");

  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Emergency Category Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    



    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SNO</th>
                    <th>Applicant Name</th>
                    <th>Category Name</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>View</th>
                    <th>Action</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    <!-- Query -->
                    <?php
                      $result = $data->getData('application','*','','status','asc');
                      $sn=1;
                      if(isset($result['0']))
                      {
                        foreach ($result as $value)
                        {
                          $app_id = $value['reg_id'];
                          $app_arr = array('id'=>$app_id);
                          $applicant =  $data->getData('registration','*',$app_arr);

                          echo "<tr><td>" . $sn . "</td>";
                          echo "<td>" . $applicant[0]['fname'] . " " . $applicant[0]['lname'] . "</td>";  
                          echo "<td>" . $value['subcategory'] . "</td>";
                          echo "<td>" . $value['amount'] . "</td>";
                          echo "<td>" . $value['datehappened'] . "</td>";
                          echo "<td><img width='100' height='100' src='../../../images/".$value['image']."' ></td>";
                          ?>


                          <td><a href="viewapplication.php?id=<?php echo $value['id'];?>&table=application"><i class="fa fa-eye" style="font-size:150%"></i></a></td>
  
                            <td>
                              <?php
                              if($value['status']!=3)
                              {
                              ?>
                                <a href="confirm.php?id=<?php echo $value['id']?>&table=application" id="a_id1"><span class="badge badge-success" style="width:40%;">Confirm</span></a>
                                <a href="reject.php?id=<?php echo $value['id']?>&table=application" id="a_id"><span class="badge badge-danger" style="width:40%;">Reject</span></a>
                              <?php
                              }
                              else
                              {?>
                                <a href="" style="width:100%;" class="badge badge-info">Completed</span></a>
                                <?php
                              }
                             ?>
                            </td>





                          <?php
                          if($value['status']==0)
                          {
                          ?>
                            <td><span class="badge badge-warning" style="width:100%;">Pending</span></td></tr>
                          <?php
                          }
                          else if($value['status']==1)
                          { 
                          ?>
                            <td><span class="badge badge-success" style="width:100%;">Confirmed</span></td>
                          <?php
                          }
                          else if($value['status']==2)
                          {
                          ?> 
                            <td><span class="badge badge-danger" style="width:100%;">Rejected</span></td>
                          <?php
                          }
                          else
                          {
                          ?>
                            <td><span class="badge badge-info" style="width:100%;">Completed</span></td>
                          <?php
                          }
                          ?>
                          </tr>
                        

                        <?php  
                        $sn++;   
                        }
                      }
                      else
                      {
                        ?>
                        <td colspan="5" style="text-align: center;"><b>No Result Found</b></td>
                        <?php
                      }                   
                  ?>
                  <!-- Query -->
                  </tbody>
                  <!-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> -->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-pre
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- Bootstrap 4 -->

<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>



<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<!-- Tables -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>




<!-- Confirmation -->
<script type="text/javascript">
    $(function() {
        $('td #a_id').click(function() {
            return confirm("Are You sure that You want to reject this application?");
        });
    });



     $(function() {
        $('td #a_id1').click(function() {
            return confirm("Are You sure that You want to confrim this application?");
        });
    });
</script>
<!-- Confirmation -->
</body>
</html>
