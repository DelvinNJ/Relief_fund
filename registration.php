<?php

  include 'database.php';  
  $data = new Databases;   
  if(isset($_POST["register"]))  
  {  
      $insert_data = array(  
          'fname' => mysqli_real_escape_string($data->con, $_POST['fname']),
          'lname' => mysqli_real_escape_string($data->con, $_POST['lname']),
          'email' => mysqli_real_escape_string($data->con, $_POST['email']),
          'phone' => mysqli_real_escape_string($data->con, $_POST['phone']),
          'password' => md5(mysqli_real_escape_string($data->con, $_POST['password'])),
          'pancard' => mysqli_real_escape_string($data->con, $_POST['pancard']),
          'status' =>mysqli_real_escape_string($data->con, $_POST['status']),
          'aadhaar' => mysqli_real_escape_string($data->con, $_POST['aadhaar']),
      );  
      if($data->insert('registration', $insert_data))  
      {  
          echo '<script type="text/javascript">'; 
          echo 'alert("Registration Done Successfully");'; 
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
           <script src="./assets/js/validate-jquery.js"></script>
           <script src="./assets/js/validate.js"></script>
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
      


    </head>
    <body>
    <!-- NAVBAR
    ================================================== -->

    <header class="main-header">
        
    
        <nav class="navbar navbar-static-top">

            <div class="navbar-top">

              <div class="container">
                  <div class="row">

                    <div class="col-sm-6 col-xs-12">

                        <ul class="list-unstyled list-inline header-contact">
                            <li> <i class="fa fa-phone"></i> <a href="tel:">+212 658 986 213 </a> </li>
                             <li> <i class="fa fa-envelope"></i> <a href="mailto:contact@sadaka.org">contact@sadaka.org</a> </li>
                       </ul> <!-- /.header-contact  -->
                      
                    </div>

                    <div class="col-sm-6 col-xs-12 text-right">

                        <ul class="list-unstyled list-inline header-social">

                            <li> <a href="#" target="_blank"> <i class="fa fa-facebook"></i> </a> </li>
                            <li> <a href="#" target="_blank"> <i class="fa fa-twitter"></i>  </a> </li>
                            <li> <a href="#" target="_blank"> <i class="fa fa-google"></i>  </a> </li>
                            <li> <a href="#" target="_blank"> <i class="fa fa-youtube"></i>  </a> </li>
                            <li> <a href="#" target="_blank"> <i class="fa fa fa-pinterest-p"></i>  </a> </li>

                       </ul> <!-- /.header-social  -->
                      
                    </div>


                  </div>
              </div>

            </div>

            <div class="navbar-main">
              
              <div class="container">

                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                  </button>
                  
                  <a class="navbar-brand" href="index.html"><img src="assets/images/sadaka-logo.png" alt=""></a>
                  
                </div>

                <div id="navbar" class="navbar-collapse collapse pull-right">

                  <ul class="nav navbar-nav">

                    <li><a href="index.html">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li class="has-child"><a href="#">CAUSES</a>

                      <ul class="submenu">
                         <li class="submenu-item"><a href="causes.html">Causes list </a></li>
                         <li class="submenu-item"><a href="causes-single.html">Single cause </a></li>
                         <li class="submenu-item"><a href="causes-single.html">Single cause </a></li>
                         <li class="submenu-item"><a href="causes-single.html">Single cause </a></li>
                      </ul>

                    </li>
                    <li><a href="gallery.html">GALLERY</a></li>
                    <li><a class="is-active"  href="contact.html">CONTACT</a></li>

                  </ul>

                </div> <!-- /#navbar -->

              </div> <!-- /.container -->
              
            </div> <!-- /.navbar-main -->


        </nav> 

    </header> <!-- /. main-header -->


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
         <div style="padding-top: 20px !important; padding-bottom:20px !important"> <h1 class="text-danger" id="error-valid"></h1></div>

          <form method="post" name="vform" id="vform">

              
              <div class="row">

                            <div class="form-group col-md-12">

                            <label>Register As</label>
                            <br>
                           <select class="form-control" name="status" id="status" required>
                            <option value="">Choose Type Of User</option>
                             <option value="0">Applicant</option>
                             <option value="1">Donor</option>
                           </select>
                           
                            </div>


                
              </div>

              <div class="row">

                            <div class="form-group col-md-6">
                            <label>First Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name*"   autofocus data-error="First Name Is Required">
                           
                            </div>

                             <div class="form-group col-md-6">
                                <label>Last Name</label>
                                <input type="text" name="lname" id="lname" class="form-control"  placeholder="Last Name*" >
                                
                            </div>

                
              </div>
              <div class="row">

                            <div class="form-group col-md-6">
                            <label>Email Address</label>
                            <input type="text" name="email" id="email" class="form-control"  placeholder="E-mail*">
                            <div id="email_error"></div>
                            </div>

                             <div class="form-group col-md-6">
                                <label>Phone Number</label>
                                <input type="text" name="phone" id="phone"  class="form-control" placeholder="Phone Number*" maxlength="10">
                                <div id="phone_error"></div>
                                
                            </div>
                            
                
              </div>
              <div class="row">

                            <div class="form-group col-md-6">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password*" >
                                
                            </div>

                             <div class="form-group col-md-6">
                                <label>Confirm password</label>
                                <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password*">
                                
                            </div>
                            
                
              </div>
              <div class="row">

                            <div class="form-group col-md-6">
                            <label>Aadhaar Number</label>
                            <input type="text" name="aadhaar" id="aadhaar" class="form-control" value="" placeholder="Aadhaar Number*">
                            <div id="aadhaar_error"></div>
                            </div>


                             <div class="form-group col-md-6">
                                <label>Pancard Number</label>
                                <input type="text" name="pancard" id="pancard" class="form-control" value="" placeholder="Pan Card Number*">
                                <div id="pan_error"></div>
                            </div>
                            
                
              </div>


                           <div class="form-group">
                              <!-- <input type="submit" id="register" name="register" value="Register" class="btn btn-primary pull-right" /> -->
                              <button name="register" id="register" class="btn btn-primary">Register</button>
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



    <footer class="main-footer">

        <div class="footer-top">
            
        </div>


        <div class="footer-main">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-4">

                        <div class="footer-col">

                            <h4 class="footer-title">About us <span class="title-under"></span></h4>

                            <div class="footer-content">
                                <p>
                                    <strong>Sadaka</strong> ipsum dolor sit amet, consectetur adipiscing elit. Ut at eros rutrum turpis viverra elementum semper quis ex. Donec lorem nulla, aliquam quis neque vel, maximus lacinia urna.
                                </p> 

                                <p>
                                    ILorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at eros rutrum turpis viverra elementum semper quis ex. Donec lorem nulla, aliquam quis neque vel, maximus lacinia urna.
                                </p>

                            </div>
                            
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="footer-col">

                            <h4 class="footer-title">LAST TWEETS <span class="title-under"></span></h4>

                            <div class="footer-content">
                                <ul class="tweets list-unstyled">
                                    <li class="tweet"> 

                                        20 Surprise Eggs, Kinder Surprise Cars 2 Thomas Spongebob Disney Pixar  http://t.co/fTSazikPd4 

                                    </li>

                                    <li class="tweet"> 

                                        20 Surprise Eggs, Kinder Surprise Cars 2 Thomas Spongebob Disney Pixar  http://t.co/fTSazikPd4 

                                    </li>

                                    <li class="tweet"> 

                                        20 Surprise Eggs, Kinder Surprise Cars 2 Thomas Spongebob Disney Pixar  http://t.co/fTSazikPd4 

                                    </li>

                                </ul>
                            </div>
                            
                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="footer-col">

                            <h4 class="footer-title">Contact us <span class="title-under"></span></h4>

                            <div class="footer-content">

                                <div class="footer-form" >
                                    
                                    <form action="php/mail.php" class="ajax-form">

                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Name" >
                                        </div>

                                         <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="E-mail" >
                                        </div>

                                        <div class="form-group">
                                            <textarea name="message" class="form-control" placeholder="Message" ></textarea>
                                        </div>

                                        <div class="form-group alerts">
                        
                                            <div class="alert alert-success" role="alert">
                                              
                                            </div>

                                            <div class="alert alert-danger" role="alert">
                                              
                                            </div>
                                            
                                        </div>

                                         <div class="form-group">
                                            <button type="submit" class="btn btn-submit pull-right">Send message</button>
                                        </div>
                                        
                                    </form>

                                </div>
                            </div>
                            
                        </div>

                    </div>
                    <div class="clearfix"></div>



                </div>
                
                
            </div>

            
        </div>

        <div class="footer-bottom">

            <div class="container text-right">
                Sadaka @ copyrights 2015 - by <a href="http://www.ouarmedia.com" target="_blank">Ouarmedia</a>
            </div>
        </div>
        
    </footer>




       
        
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





        <!-- Validation -->
        <script src="./assets/js/jquery-2.1.3.min.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/validate.js"></script>


        <script type = "text/javascript" language = "javascript">
         $(document).ready(function() 
         {
            $("#email").blur(function()
            {
              var email = $(this).val();
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




            $("#phone").blur(function()
            {
              var phone = $(this).val();
              $.ajax({
                url:"availability.php",
                method:"POST",
                data:{phone:phone},
                success:function(data)
                {
                    if(data != '0')
                    {
                      $('#phone_error').html('<b><span class="text-danger">Phone Number Is Already Linked With Another Account</span></b>');
                      $('#register').attr("disabled",true);
                    }
                    else
                    {
                      $('#phone_error').html('');
                      $('#register').attr("disabled",false); 
                    }
                }
              });
          
            });





            //  $("#aadhaar").blur(function()
            // {
            //   var aadhaar = $(this).val();
            //   $.ajax({
            //     url:"availability.php",
            //     method:"POST",
            //     data:{aadhaar:aadhaar},
            //     success:function(data)
            //     {
            //         if(data != '0')
            //         {
            //           $('#aadhaar_error').html('<b><span class="text-danger">Aadhaar Number Is Already Linked With Another Account</span></b>');
            //           $('#register').attr("disabled",true);
            //         }
            //         else
            //         {
            //           $('#aadhaar_error').html('');
            //           $('#register').attr("disabled",false); 
            //         }
            //     }
            //   });
          
            // });


             $("#pancard").blur(function()
            {
              var pancard = $(this).val();
              $.ajax({
                url:"availability.php",
                method:"POST",
                data:{pancard:pancard},
                success:function(data)
                {
                    if(data != '0')
                    {
                      $('#pan_error').html('<b><span class="text-danger">Pancard Is Already Linked With Another Account</span></b>');
                      $('#register').attr("disabled",true);
                    }
                    else
                    {
                      $('#pan_error').html('');
                      $('#register').attr("disabled",false); 
                    }
                }
              });
          
            });



         });
      </script>



</body>
</html>
