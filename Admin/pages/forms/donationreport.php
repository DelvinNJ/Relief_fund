<?php

  include '../../../database.php';  
  include '../../../db.php';  
  $data = new Databases;  
  



  $sql = "SELECT *,payment.date as pdate,payment.amount as amount FROM payment INNER JOIN application ON payment.application_id = application.id INNER JOIN registration ON payment.donor_id  = registration.id ORDER BY payment.date ASC";

$result = mysqli_query($connect, $sql);

if(isset($_POST['submit']))
{
  $sdate = $_POST['sdate'];
  $edate = $_POST['edate'];




    $sql = "SELECT *,payment.date as pdate,payment.amount as amount FROM payment INNER JOIN application ON payment.application_id = application.id INNER JOIN registration ON payment.donor_id  = registration.id WHERE payment.date > '$sdate' AND payment.date < '$edate' ORDER BY payment.date ASC";

   $result = mysqli_query($connect, $sql);

}








   
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
            <h1>Donation Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Donation Report</li>
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
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Donation Report</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST">
                <table border="0" cellspacing="5" cellpadding="5">
                                <tbody>
                                  <tr>
                                    <td colspan="5"><b>Search By Date</b></td>
                                    <td><b>Search By Amount</b></td>
                                    <!-- <td>Search By Date</td> -->
                                  </tr>
                                  <tr>
                                    <td>Start Date:</td>
                                    <td><input type="date" id="sdate" name="sdate" required></td>
                                    <td>End Date:</td>
                                    <td><input type="date" id="edate" name="edate" required></td>
                                    <td><input type="submit" name="submit" class="btn btn-primary" value="Search"></td>


                                    <td>Minimum Amount:</td>
                                    <td><input type="text" id="min" name="min"></td>
                                    <td>Maximum Amount:</td>
                                    <td><input type="text" id="max" name="max"></td>


                                   <!--  <td>Start Date:</td>
                                    <td><input type="text" id="sdate" name="min" placeholder="yyyy-mm-dd"></td>
                                    <td>End Date:</td>
                                    <td><input type="text" id="edate" name="max" placeholder="yyyy-mm-dd"></td> -->
                                </tr>
                            </tbody>
                          </table>
                        </form>
                          <br>
                          <br>
                <div id="tab">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SNO</th>
                    <th>Applicant Name</th>
                    <th>Category Name</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Phone Number</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    <!-- Query -->
                    <?php
                      $sn=1;
                      if ((mysqli_num_rows($result) != 0))
                      {
                        foreach ($result as $value)
                        {


                          echo "<tr><td>" . $sn . "</td>";
                          echo "<td>" . $value['fname'] ." ". $value['lname'] ."</td>";  
                          echo "<td>" . $value['subcategory'] . "</td>";
                          echo "<td>" . $value['amount'] . "</td>";
                          echo "<td>" . $value['pdate'] . "</td>";
                          echo "<td>". $value['phone'] ."</td>";
                          ?>
                          </tr>
                        

                        <?php  
                        $sn++;   
                        }
                      }
                             
                  ?>
                  <!-- Query -->
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>SNO</th>
                    <th>Applicant Name</th>
                    <th>Category Name</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Phone Number</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
                <input type="button" class="btn btn-primary" value="Create PDF" id="btPrint" onclick="createPDF()" />
                  </div>


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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/
jquery.min.js"></script>
<link rel="stylesheet" type="text/css" 
href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,
pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,
b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/> 
<script type="text/javascript" src="https://cdn.datatables.net/
r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,
b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/
datatables.min.js"></script>




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




  <script type="text/javascript">
      $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
 
} );

  </script>


<!-- pdf -->
<script>
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close();   // CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>





<!-- Amount Search -->


<script type="text/javascript">
  $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat( data[3] ) || 0; // use data for the age column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);
 
$(document).ready(function() {
    var table = $('#example').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );
} );
</script>
  <style type="text/css">
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
  </style>

</script>
</body>
</html>
