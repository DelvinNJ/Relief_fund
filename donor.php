<?php
  include 'database.php';  
  $data = new Databases;     
  session_start();
  include 'donorlogin.php'; 
  $email = $_SESSION["email"];
  $condition_arr = array('email'=>$email);
  $user = $data->getData('registration','*',$condition_arr);
  $reg_id = $user[0]['id'];


  $status_arr = array('status'=>1);
  $result = $data->getData('application','*',$status_arr);
  

?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Causes | Charity / Non-profit responsive Bootstrap HTML5 template</title>
        <!-- Additional Links -->
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <!--  -->
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
        <script type="text/javascript" src="validation.js"></script>


    </head>
    <body>
    <!-- NAVBAR
    ================================================== -->

    <?php
      include('include/donor-header.php');

    ?> <!-- /. main-header -->


	<div id="homeCarousel" class="carousel slide carousel-home" data-ride="carousel">

          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#homeCarousel" data-slide-to="1"></li>
            <li data-target="#homeCarousel" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner" role="listbox">

            <div class="item active">

              <img src="assets/images/slider/home-slider-1.jpg" alt="">

              <div class="container">

                <div class="carousel-caption">

                  <h2 class="carousel-title bounceInDown animated slow">Because they need your help</h2>
                  <h4 class="carousel-subtitle bounceInUp animated slow ">Do not let them down</h4>
                  <a href="#" class="btn btn-lg btn-secondary hidden-xs bounceInUp animated slow" data-toggle="modal" data-target="#donateModal">DONATE NOW</a>

                </div> <!-- /.carousel-caption -->

              </div>

            </div> <!-- /.item -->


            <div class="item ">

              <img src="assets/images/slider/home-slider-2.jpg" alt="">

              <div class="container">

                <div class="carousel-caption">

                  <h2 class="carousel-title bounceInDown animated slow">Together we can improve their lives</h2>
                  <h4 class="carousel-subtitle bounceInUp animated slow"> So let's do it !</h4>
                  <a href="#" class="btn btn-lg btn-secondary hidden-xs bounceInUp animated" data-toggle="modal" data-target="#donateModal">DONATE NOW</a>

                </div> <!-- /.carousel-caption -->

              </div>

            </div> <!-- /.item -->




            <div class="item ">

              <img src="assets/images/slider/home-slider-3.jpg" alt="">

              <div class="container">

                <div class="carousel-caption">

                  <h2 class="carousel-title bounceInDown animated slow" >A penny is a lot of money, if you have not got a penny.</h2>
                  <h4 class="carousel-subtitle bounceInUp animated slow">You can make the diffrence !</h4>
                  <a href="#" class="btn btn-lg btn-secondary hidden-xs bounceInUp animated slow" data-toggle="modal" data-target="#donateModal">DONATE NOW</a>

                </div> <!-- /.carousel-caption -->

              </div>

            </div> <!-- /.item -->

          </div>

          <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

    </div>

	<div class="main-container">

		<div>

	        <div class="container">

	            <h2 class="title-style-1">NEED YOUR HELP <span class="title-under"></span></h2>






	            <div class="row">

      	      	<?php
                if(isset($result['0']))
                { 
                  foreach ($result as $value) 
                  {
                  ?>		
		                <div class="col-md-3 col-sm-6">

		                    <div class="cause text-center">

		                        <img src="images/<?php echo($value['image']);?>" alt="" class="cause-img">
                            <?php
                              $percentage = ($value['bal_amt'] / $value['amount']) * 100 ;
                              
                            ?>
                            &#8377; <?php echo($value['bal_amt']);?> / &#8377; <?php echo($value['amount']);?> 
		                        <div class="progress cause-progress">
		                          <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo($percentage);?>%">
		                          </div>
		                        </div>

		                        <h4 class="cause-title"><a href="#"><?php echo($value['subcategory']);?></a></h4>
		                        <div class="cause-details" style="text-align:center;">
		                            <?php echo($value['description']);?>
		                        </div>

		                        <div class="btn-holder text-center">

		                          <a href="payment.php?id=<?php echo $value['id']?>" class="btn btn-primary"> DONATE NOW</a>
		                          
		                        </div>

		                        

		                    </div> <!-- /.cause -->
		                    
		                </div> 


                    <?php
                    }
                  }
                  else
                  {?>
                      <div class="btn-holder text-center">
                        <label>No Application Found</label>
                      </div>
                  <?php
                  }
                  ?>

		                


	            </div>

	         </div>
	        
	    </div> <!-- /.our-causes -->

		


	</div> <!-- /.main-container  -->


    <?php
      include('include/donor-footer.php');
    ?>


        <!-- Donate Modal -->
    <!-- /.modal -->




       
        
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
         <!-- Additional -->

        <!-- CCV -->

        <!-- CCV -->
        <!-- Additional -->
    </body>
</html>
