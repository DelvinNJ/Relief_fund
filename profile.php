<?php
  include 'database.php';  
  $data = new Databases;   
  session_start();
  $email = $_SESSION["email"];

  $condition_arr = array('email'=>$email);
  $user = $data->getData('registration','*',$condition_arr);
  $register_id  = $user[0]['id'];




  $user_arr = array('register_id'=>$register_id);
  $newuser = $data->getData('profile','*',$user_arr);
  print_r($user_arr);


  if($newuser!=0)
  {
    header("location:profileedit.php");
  }
 





  if(isset($_POST["submit"]))  
  {  


      $insert_data = array(  
          'register_id ' => $register_id ,

          'dob' => mysqli_real_escape_string($data->con, $_POST['dob']),
          'gender' => mysqli_real_escape_string($data->con, $_POST['gender']),
          
          'address' => mysqli_real_escape_string($data->con, $_POST['address']),
          'pincode' => mysqli_real_escape_string($data->con, $_POST['pincode']),
          'village' => mysqli_real_escape_string($data->con, $_POST['village']),
          'district' => mysqli_real_escape_string($data->con, $_POST['district']),
          'occupation' => mysqli_real_escape_string($data->con, $_POST['occupation']),
          'income' => mysqli_real_escape_string($data->con, $_POST['income']),
          'status'=>0
          
          
      );  
      if($data->insert('profile', $insert_data))  
      {  
         
            echo '<script type="text/javascript">'; 
            echo 'alert("Successfully Update Profile Details");'; 
            echo 'window.location.href = "index.php";';
            echo '</script>';
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
      include('header.php');
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

          <h2 class="title-style-2">APPLICATION - APPLY ONLINE<span class="title-under"></span></h2>

          <form method="post" enctype="multipart/form-data">

              <div class="row">

                            <div class="form-group col-md-6">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" value="<?php echo($user[0]['fname']);?>" placeholder="First Name*" maxlength="25"  autofocus disabled>
                            <span style="color:red;"></span>
                            </div>

                             <div class="form-group col-md-6">
                                <label>Lat Name</label>
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
                                <label>Date of Birth</label>
                                <br>
                                <input type="date" name="dob" class="form-control" autofocus>
                                <span style="color:red;"></span>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Gender</label>
                                <br>
                                <pre><input type="radio" name="gender" value="Male" checked>  Male</pre>
                                <span style="color:red;"></span>
                            </div>
                            <div class="form-group col-md-2">
                                <label><br></label>
                                <br>
                                <pre><input type="radio" name="gender" value="Female">  Female</pre>
                                <span style="color:red;"></span>
                            </div>
                            <div class="form-group col-md-2">
                                <label><br></label>
                                <br>
                                <pre><input type="radio" name="gender" value="Other">  Other</pre>
                                <span style="color:red;"></span>
                            </div>
                                                       
              </div>




              <div class="row">

                              <div class="form-group col-md-6">
                                <label>Address</label>
                                <br>
                                <textarea class="form-control" rows="4" cols="50" name="address"></textarea>
                                <span style="color:red;"></span>
                            </div>  
                              <div class="form-group col-md-6">
                                <label>Pincode</label>
                                <input type="text" name="pincode" class="form-control" value="" placeholder="Picode*" maxlength="10">
                                <span style="color:red;"></span>
                            </div>                        
                                  
              </div>
              <div class="row">

                            <div class="form-group col-md-6">
                                <label>District</label>
                                <br>
                                <select name="district" class="form-control">
                                  <option value="kerala">Kerala</option>
                                </select>
                                <span style="color:red;"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Village</label>
                                <br>
                                <select name="village" class="form-control">
                                  <option value="kerala">Kerala</option>
                                </select>
                                <span style="color:red;"></span>
                            </div>       
              </div>

              
              <div class="row">

                            <div class="form-group col-md-6">
                              <label>Occupation</label>
                              <input type="text" name="occupation" class="form-control" placeholder="Occupation">
                              <span style="color:red;"></span>
                            </div>

                             <div class="form-group col-md-6">
                                <label>Income</label>
                                <input type="text" name="income" class="form-control" value="" placeholder="Annual Income*" maxlength="10">
                                <span style="color:red;"></span>
                            </div>       
              </div>
              

                           <div class="form-group">
                              <input type="submit" name="submit" value="Save and Contiune" class="btn btn-primary pull-right" />
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



        <script type="text/javascript">
                  $('#password, #cpassword').on('keyup', function () {
          if ($('#password').val() == $('#cpassword').val()) {
            $('#message').html('Matching').css('color', 'green');
          } else 
            $('#message').html('Not Matching').css('color', 'red');
        });
        </script>
        <!-- Additional -->
    </body>
</html>
