<?php

  include 'database.php';  
  $data = new Databases;     
  session_start();
  $email = $_SESSION["email"];
  $condition_arr = array('email'=>$email);
  $user = $data->getData('registration','*',$condition_arr);
  $donor_id = $user[0]['id'];


  $result = $data->getData('application','*');



  $id = $_GET['id'];
  $app_array = array('id'=>$id);
  echo $id;
  $app_id = $data->getData('application','*',$app_array);
  $application_id = $app_id[0]['id'];
  $amount = $app_id[0]['bal_amt'];









if(isset($_POST["donate"]))  
{

    // Create Bill Number
    $bill = $data->getData('payment','*','','id','desc','','1');
    $last = $bill[0]['bill_no'];
    if($last == '')
    {
        $bill_no = "DRF101";
    }
    else
    {
        $bill_no = substr($last, 5);
        $bill_no = intval($bill_no);
        $bill_no = "DRF10" . ($bill_no + 1);
    }


     $insert_data = array(
            'bill_no' => $bill_no,
            'application_id' => $application_id,
            'donor_id' => $donor_id,
            'name' => mysqli_real_escape_string($data->con, $_POST['card_name']),
            'amount' => mysqli_real_escape_string($data->con, $_POST['amount']),
      );  





        $bal_amt = $amount + $_POST['amount'];
        // echo "__________________" .$bal_amt . "gjhg" . $amount . "_____________________";
        if($bal_amt > $app_id[0]['amount'])
        {
            $update_arr = array(
                            'bal_amt' => $bal_amt,
                            'status' => 3);
            $data->updateData('application',$update_arr,$application_id);

        } 
        else
        {
            $update_arr = array('bal_amt'=>$bal_amt);
            $data->updateData('application',$update_arr,$application_id);
        }
              
      if($data->insert('payment', $insert_data))  
      {  
          echo '<script type="text/javascript">'; 
          echo 'alert("Payment Successfully");'; 
          echo 'window.location.href = "certificate.php";';
          echo '</script>';
  
      }   
}


  

?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Contact | Charity / Non-profit responsive Bootstrap HTML5 template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Add links -->
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
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

    <?php
        include('header.php');
    ?>
     <!-- /. main-header -->


    <div class="page-heading text-center">

        <div class="container zoomIn animated">
            
            <h1 class="page-title">DONATE ONLINE<span class="title-under"></span></h1>
            <p class="page-description">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit Necessitatibus.
            </p>
            
        </div>

    </div>

    <div class="main-container fadeIn animated">

        <div class="container">

            <div class="row">

                <div class="col-md-7 col-sm-12 col-form">

                    <h2 class="title-style-2">DONATE ONLINE<span class="title-under"></span></h2>

                    <form method="POST">

                        <div class="row">

                            <div class="form-group col-md-12">
                                <label class="contact-icon">CARD HOLDER NAME</label>
                                <input type="text" name="card_name" class="form-control" placeholder="Name*" required>
                            </div>
                            
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label class="contact-icon">CARD NUMBER</label>
                                <input type="text" name="card_number"  id="cr_no" class="form-control" placeholder="0000 0000 0000 0000*" maxlength="19" minlength="19" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="contact-icon">AMOUNT</label>
                                <input type="text" name="amount" class="form-control" placeholder="Amount*" required>
                            </div>
                            
                        </div>
                        <label>EXP MONTH & YEAR</label>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <select class="form-control" id="year" name="expmonth">
                                    <option>Jan</option>
                                    <option>Feb</option>
                                    <option>Mar</option>
                                    <option>Apr</option>
                                    <option>May</option>
                                    <option>Jun</option>
                                    <option>Jul</option>
                                    <option>Aug</option>
                                    <option>Sep</option>
                                    <option>Oct</option>
                                    <option>Nov</option>
                                    <option>Dec</option>
                                </select>
                            </div>

                             <div class="form-group col-md-4">
                                <!-- <input type="email" name="email" class="form-control" placeholder="E-mail*" required> -->
                                <select class="form-control" id="year" name="expyear">
                                    <option selected>Year</option>
                                    <option>2021</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                    <option>2026</option>
                                    <option>2027</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="password" name="ccv" class="form-control" placeholder="CVV*" maxlength="3" minlength="3" required>
                                
                            </div>
 

                        </div>

                        

                          

                         <div class="form-group">
                            <!-- <button type="submit" class="btn btn-primary pull-right">DOANTE NOW</button> -->
                            <input type="submit" name="donate" class="btn btn-primary pull-right" value="DOANTE NOW">
                        </div>

                        <div class="clearfix"></div>

                    </form>

                </div>

                <div class="col-md-4 col-md-offset-1 col-contact">

                    <h2 class="title-style-2"> Accepted Cards <span class="title-under"></span></h2>
                    

                    <div class="contact-items">

                        <i class="fa fa-cc-visa" style="color:navy;font-size:250%;"></i>
                        <i class="fa fa-cc-amex" style="color:blue;font-size:250%;"></i>
                        <i class="fa fa-cc-mastercard" style="color:red;font-size:250%;"></i>
                        <i class="fa fa-cc-discover" style="color:orange;font-size:250%;"></i>
                    </div>

                    
                    
                </div>

            </div> <!-- /.row -->


        </div>
        


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



        <!-- Additional -->
        <script type="text/javascript">
            $(document).ready(function(){
        //For Card Number formatted input
        var cardNum = document.getElementById('cr_no');
        cardNum.onkeyup = function (e) {
        if (this.value == this.lastValue) return;
        var caretPosition = this.selectionStart;
        var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
        var parts = [];

        for (var i = 0, len = sanitizedValue.length; i < len; i +=4) { parts.push(sanitizedValue.substring(i, i + 4)); } for (var i=caretPosition - 1; i>= 0; i--) {
            var c = this.value[i];
            if (c < '0' || c> '9') {
                caretPosition--;
                }
                }
                caretPosition += Math.floor(caretPosition / 4);

                this.value = this.lastValue = parts.join(' ');
                this.selectionStart = this.selectionEnd = caretPosition;
                }

                })
        </script>
        <!-- Additional -->
    </body>
</html>
