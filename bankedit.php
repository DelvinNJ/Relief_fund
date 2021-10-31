<?php

  include 'database.php';  
  $data = new Databases;   
  session_start();
  $email = $_SESSION["email"];

  // Check the current user


  if(isset($_SESSION["email"]))  
 {  
      $email = $_SESSION['email'];
      $condition_arr = array(
                        'email'=>$email,
                      );
      $result = $data->getData('registration','*',$condition_arr);  
      if ($result > 0) 
      {
        $_SESSION['email'] = $email;    
        
        if ($result[0]['status'] == 1) 
        {
          header("location:donor.php");
        }
        else if ($result[0]['status'] == 2) 
        {
          header("location:Admin");
        }
      }
 }






  $condition_arr = array('email'=>$email);
  $user = $data->getData('registration','*',$condition_arr);
  $reg_id = $user[0]['id'];


  $condition_arr = array('reg_id'=>$reg_id);
  $bank = $data->getData('bank','*',$condition_arr);
  $id = $bank[0]['id'];
  echo "$id";


  if(isset($_POST["submit"]))  
  {  
      $passbook = $_FILES['passbook']['name'];
      $target = "document/".basename($passbook);




      $update_arr = array(  
          'bank' => mysqli_real_escape_string($data->con, $_POST['bank']),
          'accnum' => mysqli_real_escape_string($data->con, $_POST['accnum']),
          'ifsc' => mysqli_real_escape_string($data->con, $_POST['ifsc']),
          'passbook' => mysqli_real_escape_string($data->con, $_FILES['passbook']['name']),
          'reg_id' => $reg_id
      );  

      $data->updateData('bank',$update_arr,$id);  
      move_uploaded_file($_FILES['passbook']['tmp_name'], $target);
      echo '<script type="text/javascript">'; 
      echo 'alert("Successfully Update Bank Details");'; 
      echo 'window.location.href = "home.php";';
      echo '</script>';     
  }  

?>
 
<!DOCTYPE html>
<html class="no-js">
    <head>
        

        <title>Bank Details</title>  
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
      include('header.php');
    ?>
    <!-- /. main-header -->


  <div class="page-heading text-center">

    <div class="container zoomIn animated">
      
      <h1 class="page-title">REGISTER NOW <span class="title-under"></span></h1>
      <p class="page-description">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit Necessitatibus.
      </p>
      
    </div>

  </div>

  <div class="main-container fadeIn animated">

    <div class="container">

      <div class="row">

        <div class="col-md-10 col-sm-12 col-form">

          <h2 class="title-style-2">REGISTRATION FORM <span class="title-under"></span></h2>

          <form method="post" enctype="multipart/form-data" name="bankform" id="bankform">

              <div class="row">

                            <div class="form-group col-md-6">
                              <label>Bank Account Number</label>
                            <input type="password" name="accnum" id="accnum" class="form-control" value="<?php echo($bank[0]['accnum']);?>" placeholder="Account Number*" maxlength="25" autofocus>
                            
                            </div>

                            <!-- Error DI=iv -->
                            

                            <div class="form-group col-md-6">
                              <label>Confirm Bank Account Number</label>
                            <input type="text" name="c_accnum" id="c_accnum" class="form-control" value="<?php echo($bank[0]['accnum']);?>" placeholder="Account Number*" maxlength="25" >
                            
                            </div>
              </div>
              <div class="row">
                             <div class="form-group col-md-6">
                                <label>IFSC code</label>
                                <input type="password" name="ifsc" id="ifsc" class="form-control" value="<?php echo($bank[0]['ifsc']);?>" placeholder="IFSC Code*" maxlength="25">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Confirm IFSC code</label>
                                <input type="text" name="c_ifsc" id="c_ifsc" class="form-control" value="<?php echo($bank[0]['ifsc']);?>" placeholder="IFSC Code*" maxlength="25">
                            </div>

                
              </div>
              <div class="row">

                            <div class="form-group col-md-6">
                            <label>Name of Bank</label>
                            <input type="text" name="bank" id="bank" class="form-control" value="<?php echo($bank[0]['bank']);?>" placeholder="Name of Bank*" maxlength="30">
                            </div>

                             <div class="form-group col-md-6">
                                <label>Passbook</label>
                                <input type="file" name="passbook" class="form-control" >
                            </div>
                            
                
              </div>
              
             


                           <div class="form-group">
                              <input type="submit" name="submit" value="Add Your Account" class="btn btn-primary pull-right" />
                          </div>

                          <div class="clearfix"></div>

          </form>
          <!-- <form >  
                     <label>Enter email</label>  
                     <input type="text" name="email" class="form-control"  />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="password" name="password" class="form-control"  />  
                     <br />  
                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <br />    
                </form>    -->

        </div>

        <!-- <div class="col-md-4 col-md-offset-1 col-contact">

          <h2 class="title-style-2"> SADAKA CONTACTS <span class="title-under"></span></h2>
          <p>
            <b>Sadaka</b> ipsum dolor sit amet, consectetur adipiscing elit. Ut at eros rutrum turpis viverra elementum semper quis ex. Donec lorem nulla .
          </p>

          <div class="contact-items">

            <ul class="list-unstyled contact-items-list">
              <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-map-marker"></i></span> 135 Hay el nahda, Rabat, Morocco</li>
              <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-phone"></i></span> 00 210 25 55  55 11</li>

              <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-envelope"></i></span> contact@sadaka.org</li>
            </ul>
          </div> -->

          
          
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



        
        <script src="./assets/js/jquery-2.1.3.min.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/validate.js"></script>



    </body>
</html>
