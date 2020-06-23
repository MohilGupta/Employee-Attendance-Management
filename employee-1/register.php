<?php  

include("includes/handlers/config.php");
include("includes/handlers/login-handler.php");
include("includes/handlers/register-handler.php");



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
        <title>Register with us</title>
 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous"> 
 
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
       
 
        <style>
           
            
            form{
               width:50%;
               border-radius: 5px;
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.12), 0 1px 4px rgba(0, 0, 0, 0.24);
                background: rgba(0, 0, 0, 0)!important;
                padding: 20px;
                margin-top: 50px;
               margin-left: 25%;
            }
            
            .btn{
                margin-top: 10px;
                background-color:#000000; 
                color: #fff500;
            }
            .btn:hover{
                background-color:#fff500;
                color:black;
                font-weight:bold;
            }
            .modal-title{
                text-align: center;
                width: 100%;
            }
            .error{
                width:100%;
               margin: 0px 0px 0px 0px;
                color: red;
            }
            .input-div input{
                padding-left:40px;
            }
            .input-div{
                position: relative;
            }
            .input-div i{
                position: absolute;
                top:10px;
                left:10px;
                
            }

            
        </style>
    </head>
 
    <body>
 
        
 
        <div class="container" style="margin-top: 20px;">
            <h2 style="text-align: center;">Register your Organisation at <span style="">Being There</span></h2>
            <h5 style="text-align: center;">Make your presence count !</h5>
            <form  method="POST" action="register.php" id="registerForm">             
                <div class="md-form mb-3 input-div">
                    
                    <i class="fa fa-university"></i>
                    <input type="text" class="form-control validate field" id="org" placeholder="Organisation" name="organisation" required>
                </div>
                
                <div class="md-form mb-3 input-div">
                    <i class="fa fa-envelope"></i>
                    <input type="email" class="form-control validate field" id="email" placeholder="Email" name="email" required>
                </div>
                <div class="md-form mb-3 input-div">
                    <i class="fa fa-mobile"></i>
                    <input type="tel" class="form-control validate field" id="mobile" placeholder="Contact Number" name="mobile"   required>
                </div>            
                <div class="md-form mb-3 input-div">
                    <i class="fa fa-map-marker"></i>
                    <input type="text" class="form-control validate field" id="address" placeholder="Address" name="address"   required>
                </div>
                <div class="md-form mb-3 input-div">
                    <i class="fa fa-map-marker"></i>
                    <input type="text" class="form-control validate field" id="city" placeholder="City" name="city" required>
                </div>
                <div class="md-form mb-3 input-div">
                    <i class="fa fa-map-marker"></i>
                    <input type="text" class="form-control validate field" id="state" placeholder="State" name="state" required>
                </div>
                <div class="md-form mb-3 input-div">
                    <i class="fa fa-unlock-alt"></i>
                    <input type="password" class="form-control validate field" id="password" placeholder="Password" name="password" required>
                </div>
                <div class="md-form mb-3 input-div">
                    <i class="fa fa-unlock-alt"></i>
                    <input type="password" class="form-control validate field" id="repassword" placeholder="Re enter password" name="repassword"  required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn" name="registerButton">Register</button>
                </div>
                <h6 style="margin-top: 10px; text-align: center;">Already have an account? <a href="index.php/#loginmodal">Log in</a></form></h6>
            </form>
                       
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script
                src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
        <script type="text/javascript">
    
            $(document).ready(function(){
                $("#registerForm").validate({
                    rules:{
                        organisation:{
                            required:true,
                            minlength:5
                        },
                        email:{
                            required:true,
                            email:true
                        },
                        mobile:{
                            required:true,
                            minlength:7
                        },
                        address:{
                            required:true,
                            minlength:10
                        },
                        city:{
                            required:true,
                            minlength:3
                        },
                        state:{
                            required:true,
                            minlength:3
                        },
                        password:{
                            required:true,
                            minlength:5,
                            maxlength:15
                        },
                        repassword:{
                            required:true,
                            minlength:5,
                            maxlength:15,
                            equalTo:"#password"
                        }
                    },
                    messages:{
                        organisation:{
                            required:"Please enter a valid organisation"
                        },
                        email:{
                            email:"Please enter a valid email"
                        },
                        repassword:{
                            equalTo: "Passwords do not match !"
                        },
                        password:{
                            minlength:"Password should be atleast 5 characters"
                        }
                    }
                })
            });
    
    
        </script>

    </body>
</html>
 

