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

                            <li> <a href="#"> <i class="fa fa-facebook"></i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-twitter"></i>  </a> </li>
                            <li> <a href="#"> <i class="fa fa-google"></i>  </a> </li>
                            <li> <a href="#"> <i class="fa fa-youtube"></i>  </a> </li>
                            <li> <a href="#"> <i class="fa fa fa-pinterest-p"></i>  </a> </li>
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

                    <li><a href="donor.php">HOME</a></li>
                    
                    <li><a href="">CAUSES</a></li>
                      
                    <!-- <li class="has-child"><a href="">CAUSES</a>

                      <ul class="submenu">
                         <li></li>
                         <li class="submenu-item"><a href="profile.php"><i class="fa fa-edit" style="font-size:100%"></i> Add</a>
                        <li class="submenu-item"><a href="application-status.php"><i class="fa fa-eye" style="font-size:100%"></i> View</a>
                      </ul>

                    </li> -->





                    
                    <li><a href="">ABOUT US</a></li>
                    <li><a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJvlqGggtDGlMLTdpRccQNccmbLFGkrFXHlldZNCspQrZFqNblprsBbfKCCdtVbNqNsNbTL">CONTACT US</a></li>
                    



                    <li class="has-child"><a href=""><?php echo $user[0]['fname'] . " " . $user[0]['lname']; ?></a>

                      <ul class="submenu">
                         <li></li>
                        <li class="submenu-item"><a href="certificate.php"><i class="fa fa-file-o" style="font-size:100%"></i> Certificate</a>
                         <li class="submenu-item"><a href="resetpassword.php"><i class="fa fa-lock" style="font-size:24px"></i> Password</a></li>
                         <li class="submenu-item"><a href="logout.php"><i class="fa fa-power-off" style="font-size:100%"></i> Logout</a></li>
                      </ul>

                    </li>

                    

                  </ul>

                </div> <!-- /#navbar -->

              </div> <!-- /.container -->
              
            </div> <!-- /.navbar-main -->


        </nav> 

    </header>