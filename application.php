
<?php

  include 'database.php';  
  $data = new Databases;     
  session_start();
  $email = $_SESSION["email"];

  $condition_arr = array('email'=>$email);
  $user = $data->getData('registration','*',$condition_arr);
  $reg_id = $user[0]['id'];

  $bank_arr = array('reg_id'=>$reg_id);
  $bank = $data->getData('bank','*',$bank_arr);


   if($bank == 0 )
    {
      echo '<script type="text/javascript">'; 
      echo 'alert("Update Your Account Details");'; 
      echo 'window.location.href = "bank.php";';
      echo '</script>';
    }

  if(isset($_POST["save"]))  
  {  
      $incomecertificate = $_FILES['incomecertificate']['name'];
      $ration = $_FILES['ration']['name'];
      $image = $_FILES['doc1']['name'];
      $doc2 = $_FILES['doc2']['name'];
      $doc3 = $_FILES['doc3']['name'];
      $selfdeclaration = $_FILES['selfdeclaration']['name'];


      $target1 = "document/".basename($incomecertificate);
      $target2 = "document/".basename($ration);
      $target3 = "images/".basename($image);
      $target4 = "document/".basename($doc2);
      $target5 = "document/".basename($doc3);
      $target6 = "document/".basename($selfdeclaration);

      $insert_data = array(  


          'reg_id' => $reg_id,
          'cat_id' => mysqli_real_escape_string($data->con, $_POST['category']),
          'subcategory' => mysqli_real_escape_string($data->con, $_POST['subcategory']),
          'amount' => mysqli_real_escape_string($data->con, $_POST['amount']),
          
          'bal_amt' => 0,
          'description' => mysqli_real_escape_string($data->con, $_POST['description']),
          'datehappened' => mysqli_real_escape_string($data->con, $_POST['datehappened']),

          'incomecertificate' => mysqli_real_escape_string($data->con, $_FILES['incomecertificate']['name']),
          'ration' => mysqli_real_escape_string($data->con, $_FILES['ration']['name']),
          'image' => mysqli_real_escape_string($data->con, $_FILES['doc1']['name']),
          'doc2' => mysqli_real_escape_string($data->con, $_FILES['doc2']['name']),
          'doc3' => mysqli_real_escape_string($data->con, $_FILES['doc3']['name']),
          'selfdeclaration' => mysqli_real_escape_string($data->con, $_FILES['selfdeclaration']['name']),
          'status' => 0

          
      );  
      if($data->insert('application', $insert_data))  
      {  
          move_uploaded_file($_FILES['incomecertificate']['tmp_name'], $target1);
          move_uploaded_file($_FILES['ration']['tmp_name'], $target2);
          move_uploaded_file($_FILES['doc1']['tmp_name'], $target3);
          move_uploaded_file($_FILES['doc2']['tmp_name'], $target4);
          move_uploaded_file($_FILES['doc3']['tmp_name'], $target5);
          move_uploaded_file($_FILES['selfdeclaration']['tmp_name'], $target6);

          echo '<script>alert("Successfully Add Your Application")</script>';  
      }    
  }  

?> 




<!DOCTYPE html>
<html class="no-js">
    <head>
        

        <title>Registration</title>  
            <!-- Additional -->
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>

        <!-- Bootsrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <!-- Font awesome -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Template main Css -->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!-- Modernizr -->
        <script src="assets/js/modernizr-2.6.2.min.js"></script>
        <script src="validation.js"></script>


    </head>
    <body>
    <!-- NAVBAR
    ================================================== -->

    <?php
      include('header.php')
    ?>
    <!-- /. main-header -->


  <div class="page-heading text-center">

    <div class="container zoomIn animated">
      
      <h1 class="page-title">CONTACT US <span class="title-under"></span></h1>
      <p class="page-description">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit Necessitatibus.
      </p>
      
    </div>

  </div>

  <div class="main-container fadeIn animated">

    <div class="container">

      <div class="row">

        <div class="col-md-12 col-sm-12 col-form">

          <h2 class="title-style-2">UPLOAD DOCUMENTS<span class="title-under"></span></h2>

          <form method="post" action="" enctype="multipart/form-data" id="applicationform" name="applicationform">

              <div class="row">

                            <div class="form-group col-md-6">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" value="<?php echo($user[0]['fname']);?>" placeholder="First Name*" maxlength="25"  autofocus disabled>
                            <span style="color:red;"></span>
                            </div>

                             <div class="form-group col-md-6">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="form-control" value="<?php echo($user[0]['lname']);?>" placeholder="Last Name*" maxlength="25" disabled>
                                <span style="color:red;"></span>
                            </div>

                
              </div>
              <div class="row">

                            <div class="form-group col-md-6">
                                <label>Email Address</label>
                                <input type="text" name="email" class="form-control" value="<?php echo($user[0]['email']);?>" required placeholder="E-mail*" maxlength="30" disabled>
                                <span style="color:red;"></span>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Phone Number</label>
                                <input type="text" name="phone" id="phone" value="<?php echo($user[0]['phone']);?>" class="form-control" placeholder="Phone Number*"  maxlength="10" disabled>
                                <span style="color:red;"></span> 
                            </div>
                            
                
              </div>
              
              <div class="row">

                            <div class="form-group col-md-6">
                              <label>Aadhaar Number</label>
                              <input type="text" name="aadhaar" id="aadhaar" class="form-control" value="<?php echo($user[0]['aadhaar']);?>" placeholder="Aadhaar Number*" maxlength="14" disabled>
                              <span style="color:red;"></span>
                            </div>

                             <div class="form-group col-md-6">
                                <label>Pan card Number</label>
                                <input type="text" name="pancard" class="form-control" value="<?php echo($user[0]['pancard']);?>" placeholder="Pan Card Number*" maxlength="10" disabled>
                                <span style="color:red;"></span>
                            </div>       
              </div>
              
              <div class="row">
                            <div class="form-group col-md-6">

                              <?php
                              $category = $data->getData('emgcategory','*');
                              ?>
                                <label>Category</label>
                                <select class="form-control" name="category" id="category" required>
                                  <option value="">---Select Category---</option>


                                  <?php foreach ($category as $value)
                                  {
                                  ?>
                                    <option value="<?php echo $value['id'];?>"><?php echo $value['category'];?></option>
                                  <?php
                                  }
                                  ?>
                                  



                                </select>
                                <span style="color:red;"></span>
                            </div>   
                           <div class="form-group col-md-6">
                                <label>Sub Category</label>
                                <input type="text" class="form-control" name="subcategory" id="subcategory" required>
                                <span style="color:red;"></span>
                            </div>      
              </div>

              <div class="row">

                            <div class="form-group col-md-6">
                                <label>Expected Amount</label>
                                <input type="text" class="form-control" name="amount" max="2500000" maxlength="7" id="amount">
                                <span style="color:red;"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Which Day Its Happened</label>
                                <input type="date" name="datehappened" id="datehappened" class="form-control" max="<?php echo(date('Y-m-d'))?>">
                                <span style="color:red;"></span>
                            </div>       
              </div>





              <div class="row">
                            <div class="form-group col-md-12">
                              <label>Description</label>
                              <textarea rows="5" class="form-control" name="description" id="description" maxlength="250"></textarea>
                              <span style="color:red;"></span>
                            </div>
              </div>
              <div class="row">
                            


                             <div class="form-group col-md-6">
                              <label>Image</label>
                              <input type="file" name="doc1" id="doc1" class="form-control">
                              <span style="color:red;"></span>
                            </div>     
                            <div class="form-group col-md-6">
                              <label>Income Certificate</label>
                              <input type="file" name="incomecertificate" id="incomecertificate" class="form-control">
                              <span style="color:red;"></span>
                            </div>



                            <div class="form-group col-md-6">
                                <label>Ration Card</label>
                                <input type="file" name="ration" id="ration" class="form-control">
                                <span style="color:red;"></span>
                            </div> 

                            

                             <div class="form-group col-md-6">
                                <label>Supporting Document/Certificate 1</label>
                              <input type="file" name="doc2" id="doc2" class="form-control">
                                <span style="color:red;"></span>
                            </div>     


                            <div class="form-group col-md-6">
                              <label>Supporting Document/Certificate 2</label>
                              <input type="file" name="doc3" id="doc3" class="form-control">
                              <span style="color:red;"></span>
                            </div>

                             <div class="form-group col-md-6">
                                <label>Self Declaration</label>
                              <input type="file" name="selfdeclaration" id="selfdeclaration" class="form-control">
                                <span style="color:red;"></span>
                            </div>  
              </div clas="row">
              <div>
              <input type="checkbox" name="" required><p>I hereby declare that the above furnished information is true to the best of my knowledge.</p>
              </div>
              <div class="row">
                <br>
                            <div class="form-group col-md-8">
                              
                            </div>

                           <!--  <div class="form-group col-md-2">
                              <input type="submit" name="preview" value="Preview" class="btn btn-primary pull-right" />
                            </div> -->

                             <div class="form-group col-md-2">
                                <input type="submit" name="save" id="save" value="Final Submit" class="btn btn-primary pull-right" />
                            </div>       
              </div> 
          </form>
        </div>
          
        </div>

      </div> <!-- /.row -->


    </div>
    


  </div>



    <?php 
      include('footer.php');
    ?>




       
        
        <!-- jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>

        <!-- Bootsrap javascript file -->
        <script src="assets/js/bootstrap.min.js"></script>


        <!-- Google map  -->
        <script src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>


        <!-- Template main javascript -->
        <script src="assets/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>



        <script type="text/javascript">
                  $('#password, #cpassword').on('keyup', function () {
          if ($('#password').val() == $('#cpassword').val()) {
            $('#message').html('Matching').css('color', 'green');
          } else 
            $('#message').html('Not Matching').css('color', 'red');
        });
        </script>
        <!-- Additional -->


        <script src="./assets/js/jquery-2.1.3.min.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/validate.js"></script>


    <script type="text/javascript">
       


     $(function() {
        $('#save').click(function() {
            return confirm("Remember you can't update your application after submitting! Are you sure to continue?");
        });
    });
    </script>












<!--        <script type = "text/javascript" language = "javascript">
        

         $(document).ready(function() 
         {
            $("#category").change(function()
            {
              var subcategory = $(this).val();
              alert(subcategory);
              $.ajax({
                url:"availability.php",
                method:"POST",
                data:{email:email},
                success:function(data)
                {
                    if(data != '0')
                    {
                      $('#email_error').html('<b><span class="text-danger">Email Id Is Already Taken</span></b>');
                      $('#register').attr("disabled",true);
                    }
                    else
                    {
                      $('#email_error').html('');
                      $('#register').attr("disabled",false); 
                    }
                }
              });
          
            });
          

         });
      </script> -->
    </body>
</html>
