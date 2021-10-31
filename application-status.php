<?php

  include 'database.php';  
  $data = new Databases;   
  session_start();
  $email = $_SESSION["email"];
  $condition_arr = array('email'=>$email);
  $user = $data->getData('registration','*',$condition_arr);

  $id = $user[0]['id'];
  $app_arr = array('reg_id'=>$id);

  $result = $data->getData('application','*',$app_arr);






?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Single cause | Charity / Non-profit responsive Bootstrap HTML5 template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>

        <!-- Bootsrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">


        <!-- Font awesome -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- PrettyPhoto -->
        <link rel="stylesheet" href="assets/css/prettyPhoto.css">

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
    ?> <!-- /. main-header -->


	<div class="page-heading text-center">

		<div class="container zoomIn animated">
			
			<h1 class="page-title">CAUSE TITLE <span class="title-under"></span></h1>
			<p class="page-description">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit Necessitatibus.
			</p>
			
		</div>

	</div>

	<div class="main-container">
		<div class="container">			
			<div class="row ">
				<div class="col-md-12 fadeIn animate-onscroll">

					<h2 class="title-style-2">APPLICATION STATUS <span class="title-under"></span></h2>			
						<table class="table table-style-1">
					      <thead>
					        <tr>
					          <th>SNO</th>
					          <th>Application Name</th>
                    <th>Description</th>
					          <th>Amount</th>
                    <th>Balance Amount</th>
					          <th>Date</th>
                    <th>Image</th>
					          <td>Status</td>

					        </tr>
					      </thead>
					      <tbody>

                        <?php
                            foreach ($result as $value)
                            {
                            ?>
    					        <tr>
    					          <th>1</th>
    					          <td><?php echo($value['subcategory']);?></td>
                        <td><?php echo($value['description']);?></td>
    					          <td><?php echo($value['amount']);?></td>
                        <td><?php echo($value['amount'] - $value['bal_amt']);?></td>
    					          <td><?php echo($value['datehappened']);?></td>
                        <?php echo "<td><img width='100' height='100' src='images/".$value['image']."' ></td>"; ?>

    					          




                                   <?php
                                  if($value['status']==0)
                                  {
                                  ?>
                                    <td><span class="badge badge-warning" style="background-color:#ebe134;">Pending</span></td></tr>
                                  <?php
                                  }
                                  else if($value['status']==1)
                                  { 
                                  ?>
                                    <td><span class="badge badge-success" style="background-color:#0f1ef5;">Confirmed</span></td>
                                  <?php
                                  }
                                  else if($value['status']==2)
                                  {
                                  ?>
                                    <td><span class="badge badge-danger" style="background-color:red;">Rejected</span></td>
                                  <?php
                                  }
                                  else
                                  {?>
                                    <td><span class="badge badge-danger" style="background-color:green;">Completed</span></td>
                                  <?php
                                  }
                                  ?>


    					        </tr>
					        <?php
                            }
                            ?>
					        
					      </tbody>
					    </table>				
				</div>
				
			</div>

		</div>

		

		


	</div> <!-- /.main-container  -->


    <?php 
      include('footer.php');
    ?>




       
        
        <!-- jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>

        <!-- Bootsrap javascript file -->
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- PrettyPhoto javascript file -->
        <script src="assets/js/jquery.prettyPhoto.js"></script>



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
    </body>
</html>
