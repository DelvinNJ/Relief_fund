<?php
  include '../../../database.php';  
  $data = new Databases;

 if(isset($_POST["submit"]))  
  {  
    $id = $_POST['category'];
    
    $image1 = $_FILES['image1']['name'];
    // $image2 = $_FILES['image2']['name'];
    // $image3 = $_FILES['image3']['name'];
    // $image4 = $_FILES['image4']['name'];
    // $video = $_FILES['video']['name'];
    $check = $_POST['amount'];


    // Set the target location
    $target1 = "../../../images/".basename($image1);
    // $target2 = "../../../images/".basename($image2);
    // $target3 = "../../../images/".basename($image3);
    // $target4 = "../../../images/".basename($image4);
    // $target5 = "../../../images/".basename($video);



     $insert_data = array(  
            'category_id' => mysqli_real_escape_string($data->con, $_POST['category']),
            'subcategory'=> mysqli_real_escape_string($data->con, $_POST['subcategory']),
            'amount'=> mysqli_real_escape_string($data->con, $_POST['amount']),
            'description'=>mysqli_real_escape_string($data->con, $_POST['description']),
            'date'=> mysqli_real_escape_string($data->con, $_POST['date']),
            'image1' => mysqli_real_escape_string($data->con, $_FILES['image1']['name']),
            // 'image2' => mysqli_real_escape_string($data->con, $_FILES['image2']['name']),
            // 'image3' => mysqli_real_escape_string($data->con, $_FILES['image3']['name']),
            // 'image4' => mysqli_real_escape_string($data->con, $_FILES['image4']['name']),
            // 'video' => mysqli_real_escape_string($data->con, $_FILES['video']['name'])
        );  
     
     // Store the image
        if($data->insert('emgsubcategory', $insert_data))  
        {  
          move_uploaded_file($_FILES['image1']['tmp_name'], $target1);
          // move_uploaded_file($_FILES['image2']['tmp_name'], $target2);
          // move_uploaded_file($_FILES['image3']['tmp_name'], $target3);
          // move_uploaded_file($_FILES['image4']['tmp_name'], $target4);
          // move_uploaded_file($_FILES['video']['tmp_name'], $target5);
          echo '<script>alert("Successful Add a New Category ")</script>';  
        }
  } 
  // if(isset($_GET['type']) && $_GET['type']='delete')
  // {
  //   $id = $data->get_safe_str($_GET['id']);
  //   $condition_arr = array('id'=>$id);
  //   $data->deleteData('emgsubcategory',$condition_arr);
  //   echo("<script>alert('successfully Delete a Record')</script>");
    
  // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Advanced form elements</title>
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <script src="../../../validation.js"></script>
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
            <h1>Emergency Sub Category Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Select2 (Default Theme)</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="" id="emgsubcategory" name="emgsubcategory">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Category Name</label>
                      
                      <select class="form-control select2" style="width: 100%;" name="category" id="category">
                        <option value=""> --------- Select Subcategory --------- </option>p
                        <?php
                          // $sql = "SELECT * FROM emgcategory";
                          // $result = $connect->query($sql);
                          $result = $data->getData('emgcategory','*');
                          foreach ($result as $value)
                            {
                              // echo "<option>" . $rows["category"] . "</option>";
                              ?>
                              <option value="<?php echo $value['id'];?>"><?php echo $value['category'];?></option>
                              <?php
                            }
                            // $value['category']                          
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Amount</label>
                      
                        <input type="text" class="form-control" placeholder="Amount" onkeypress="javascript:return isNumber(event)" name="amount">
                      
                    </div>

                  </div>

                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Sub Category Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Sub Category Name" name="subcategory">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"></textarea>
                    </div>
                  </div>

                </div>
                <!-- Image2 -->
                <div class="row">
                  <div class="col-md-6" id="wrapper">
                     <div class="form-group">
                  <label>Date of Happen:</label>   
                        <input type="date" class="form-control" data-target="#reservationdate" name="date" max="<?php echo(date('Y-m-d'))?>">               
                </div>     
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6" id="wrapper">
                     <div class="form-group">
                      <label>Upload Image1*</label>
                        <input type="file" required id="myFile" class="form-control" id="exampleInputEmail1" name="image1" onchange="preview_image1(event)">
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <img id="output_image1"/>
                      </div>
                    </div> 
                  </div> 
                </div>
                <!-- Image3 & Image4 -->
                <div class="row">
                  <!-- <div class="col-md-6" id="wrapper">
                     <div class="form-group">
                      <label>Upload Image1*</label>
                        <input type="file" required id="myFile" class="form-control" id="exampleInputEmail1" name="image1" onchange="preview_image1(event)">
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <img id="output_image1"/>
                      </div>
                    </div> 
                  </div>  -->
                  <!-- /.col -->
                  <!-- <div class="col-md-6">
                     <div class="form-group">
                      <label>Upload Image2</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas">&#xf03e;</i></span>
                          </div>
                        <input type="file" class="form-control" id="exampleInputEmail2" name="image2" onchange="preview_image2(event)">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <img id="output_image2"/>
                      </div>
                    </div>
                  </div> -->
                </div>
                <div class="row">
                  <!-- <div class="col-md-6" id="wrapper">
                     <div class="form-group">
                      <label>Upload Image3*</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas">&#xf03e;</i></span>
                          </div>
                        <input type="file" class="form-control" id="exampleInputEmail3" name="image3" onchange="preview_image3(event)" name="image3">
                      </div>
                    </div> 
                    <div class="form-group">
                      <div class="input-group">
                        <img id="output_image3"/>
                      </div>
                    </div>
                  </div> -->

                  <!-- /.col -->
                  <div class="col-md-6">
                     <!-- <div class="form-group">
                      <label>Upload Image4</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas">&#xf03e;</i></span>
                          </div>
                       <input type="file" class="form-control" id="exampleInputEmail4" name="image4" onchange="preview_image4(event)" name="image4">
                      </div>
                    </div> -->
                    <div class="form-group">
                      <div class="input-group">
                        <img id="output_image4"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div style="padding:0.5%">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit" onclick="myFunction()"> 
                  </div>
                  
                </div>
            
                <!-- /.row -->
            </form>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>
        </div>        
      </div>
      <!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
                    <th>Category Name</th>
                    <th>Subcategory Name</th>
                    <th>Amount</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                 <tbody>
                    <!-- Query -->
                    <?php
                      $result = $data->getData('emgsubcategory','*');
                      $sn=1;
                      if(isset($result['0']))
                      {
                        foreach ($result as $value)
                        {
                          echo "<tr><td>" . $sn . "</td>";
                          // category name
                          $condition_arr = array('id'=>$value['category_id']);
                          $catname = $data->getData('emgcategory','*',$condition_arr);
                          echo "<td>" . $catname[0]['category'] . "</td>";
                          // end
                          echo "<td>" . $value['subcategory'] . "</td>";
                          echo "<td>" . $value['amount'] . "</td>";
                          echo "<td><img width='80' height='80' src='../../../images/".$value['image1']."' ></td>";
                          ?>

                          <td><a href="editemgsubcategory.php?id=<?php echo $value['id'];?>"><i style="font-size:24px" class="fa">&#xf044;</i></a></td>
                            
                            <td><a onclick="return confirm('Are You sure that You want to delete this?')" href="delete.php?id=<?php echo $value['id']?>&table=emgsubcategory" id="a_id"><i style='font-size:24px' class='fa'>&#xf2ed;</i></a></td>
                            </tr>
                        <?php  
                        $sn++;   
                        }
                      }
                      else
                      {
                        ?>
                        <td colspan="8" style="text-align: center;"><b>No Result Found</b></td>
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
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../../plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Tables -->

<!-- Bootstrap 4 -->
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



        <script src="./include/jquery-2.1.3.min.js"></script>
        <script src="./include/jquery.validate.min.js"></script>
        <script src="./include/validate.js"></script>





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
<!-- /Tables -->
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false;

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  // DropzoneJS Demo Code End
</script>

<!-- Additional -->
<!-- Image -->
<script type='text/javascript'>
function preview_image1(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image1');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
function preview_image2(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image2');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
function preview_image3(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image3');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
function preview_image4(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image4');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>






<script> 
    function myFunction() { 
        var x =  
            document.getElementById( 
              "myFile").required; 
        document.getElementById("demo").innerHTML = x; 
    } 
</script> 

<style>
#output_image1,#output_image2,#output_image3,#output_image4
{
 max-width:300px;
}
</style>
<!-- Number Validation -->
</body>
</html>
