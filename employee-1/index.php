<?php
include("includes/handlers/config.php");
include("includes/handlers/login-handler.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeingThere</title>
 
    <!--  Fontawesome  -->
    <link href="fontawesome/css/all.css" rel="stylesheet"> 
    <script defer src="fontawesome/js/all.js"></script> 
    
    <!--  Bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!--Navbar -->
    <nav class="navbar navbar-expand-lg navbar-fixed-top">
        <h4 class="navbar-brand">BeingThere</h4>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
            aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav ml-auto mr-5">
                <li class="nav-item active px-2">
                    <a class="nav-link" href="#home-section" style="color:black;">
                    Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="#about" style="color:black;">About Us</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="#features" style="color:black;">Features</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="#footer" style="color:black;">Contact us</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" id="login" href="#loginmodal" data-toggle="modal">Log in</a>
                </li>
                
            </ul>
        </div>
    </nav>
 
 
    <!--login-->
    <div id="loginmodal" class="modal fade" >
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Login</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">     
                  <form method="POST" action='index.php'>             
                      <div class="md-form mb-3 input-div">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                          <i class="fas fa-envelope" style="color: black;"></i>
                      </div>
                                  
                      <div class="md-form mb-3 input-div">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                          <i class="fas fa-unlock-alt" style="color: black;"></i>
                      </div>

                      <div class="button-div">
                        <button type="submit" class="btn loginbtn" name="login">Login</button>
                      </div>
                  </form>
              </div>              
          </div>
      </div>
  </div>
 
 
    <!--Mohil's part-->
    <div id="home-section">
        <div class="dark-overlay">
            <div class="content">
                <h1>Being There</h1>
                <h2>Make your presence count !</h2>
                <div class="content-p" >
                    <p class="lead"><span><i class="far fa-check-circle"></i></span> Interactive UI</p>
                    <p class="lead"><span><i class="far fa-check-circle"></i></span> Flexible with all type of organisations</p>
                    <p class="lead"><span><i class="far fa-check-circle"></i></span> Generate attendance reports from anywhere</p>
                    <p class="lead"><span><i class="far fa-check-circle"></i></span> Make system reliable, understandable and cost effective</p>
                </div>
                <a class="btn btn-lg registerbtn" href="register.php" role="button">
                    Register with us!
                </a>
            </div>
        </div>
    </div>
 
    <!--Aditya's section-->
    <div id="about">
        <h1 style="text-align: center; color:black;">About Us</h1>
        <p class="lead text-justify" >Being There is a web based application which help organizations to store the attendance of employees in an efficient way. The intent to design this application was to reduce the hassle of manual work in keeping long records and to provide updated information as efficiently as possible. It will help the organization to get insights of the record and avoid errors inherent in the manual works hence providing consistent and correct output.
        </p>
        <p class="lead text-justify">The system is designed in such a way that reduces feature maintenance, efforts and generates the desired reports automatically at the end. Features are provided in a hierarchical way of the organization. The admin have all rights pertaining to the system. The admin can create sub-admins too. The feature will build hierarchy, bringing in non-consistent and efficient data. 
        </p>
    </div>
 
 
    <div id="features" style="margin-bottom: 100px;">
        <div class="container">
            <h1 style="text-align: center;color:black;margin-bottom: 80px;">Features</h1>
    
            <div class="row" style="margin-bottom:30px;">
                
                <div class="col-sm-8 feature-tile-1-left">
                    <div class="col-container"  style="background-color:#F6F1F2;">
                        
                    <div class="row  no-gutters">
                            <div class="col-sm-7">
                                <img src="img/g.jpg" style="width: 100%; height:100%">
                            </div>
                            <div class="col-sm-5" >
                                <div class="text-container" style="padding:20px;color:black;">
                                    <h3 style="letter-spacing:2px;">Visual Insights</h3>
                                    <p>Get visual insights of complex calculations of attendance and payroll.</p>
                                    <p>Visualize your working days and take down tedious decision making.</p>
                                    <p>Enhance assimilation of business information.</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-sm-4 feature-tile-1-right" >
                    <div class="col-container"  style="background-color:#F6F1F2;">
                        <img src="img/calendar.jpg" style="width:100%; height:160px;">
                        <div class="content-col" style="box-sizing: border-box;
                        padding: 3%; padding-left: 8%;
                        position: relative; color:black;">
                            <h3 style="letter-spacing:2px;">Calendar</h3>
                            <p style="margin-bottom: 30px;">Track your attendance in your calendar. Get updates and ease your work. Stay updated.</p>
                        </div>
                    </div>
                </div>
    
            </div>
    
            <div class="row">
    
                <div class="col-sm-4 feature-tile-2-left" >
                    <div class="col-container"  style="background-color:#F6F1F2;">
                        <img src="img/secure.jpg" style="width:100%; height:160px;">
                        <div class="content-col" style="box-sizing: border-box;
                        padding: 3%; padding-left: 8%;
                        position: relative; color: black;">
                            <h3 style="letter-spacing:2px;">Free & Secure</h3>
                            <p>Store your data freely and don't worry about security, its 100% secured.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-8 feature-tile-2-right">
                    <div class="col-container"  style="background-color:#F6F1F2;">
    
                        <div class="row  no-gutters">
                            <div class="col-sm-7">
                                <img src="img/report.jpg" style="width: 100%; height:100%">
                            </div>
    
                            <div class="col-sm-5" >
                                <div class="text-container" style="padding:20px;color:black;">
                                    <h3 style="letter-spacing:2px;">Automated Reports</h3>
                                    <p>Get automated report generated focusing on attendance of employees.</p>
                                    <p>Handle all the paper-work efficiently and hassle-free.</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>

    <div style="position:absolute;"></div>

    <footer class="page-footer font-small unique-color-dark" id="footer"style="background-color:black; clear:both;">
    
        <div class="container" style="padding-top:30px;">
        <div class="row">
            <div class="col-sm-4 col-xs-12 company-col">
                <h3 style="color:#fff500;">BeingThere</h3>
                <p>We aim to provide companies and organisations a product that helps them manage their employees.</p>
                <span>
                    <a href="" target="_blank" style="padding-right:20px;"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="" target="_blank" style="padding-right:20px;"><i class="fab fa-linkedin fa-lg"></i></a>
                    <a href="" target="_blank" style="padding-right:20px;"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
                </span>
                
            </div>
            <div class="col-sm-4 col-xs-12 pl-5">
                <h3>Quick Links</h3>
                <a href="#home-section">Home</a><br>
                <a href="#about">About Us</a><br>
                <a href="#features">Features</a><br>
                <a href="register.php">Register</a><br>
            </div>
            <div class="col-sm-4 col-xs-12">
                
                    <h3 style="color:#fff;">Reach Us</h3>
                    <p><i class="fa fa-map" style="color:#fff;"></i> <span style="color:#fff;">#80, 4th cross, Aswath Nagar, Marathahalli, Bangalore - 560037</span></p>
                    <p><i class="fa fa-phone" style="color:#fff;"></i><span><a href="tel:(080)-4209-2269)"> (080)4209-2269</href></span></p>
                    <p><i class="fa fa-envelope" style="color:#fff;"></i><sapn><a href="mailto:Info@innerworkindia.com"> Info@innerworkindia.com</a></sapn></p>
               
            </div>
        </div>
    </div>
            <!-- Copyright -->
          
    </footer>

    <section id="footerBottom" style="background-color: #01131b;color: #fff;padding: 0.5% 0;">
        <p style="margin-left:180px;">&copy; 2020 BeingThere. All right reserved.</p>
    </section>
    
    
 
 
 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>



 

