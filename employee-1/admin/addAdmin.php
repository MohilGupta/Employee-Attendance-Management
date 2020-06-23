<?php include("../includes/handlers/config.php"); ?>

<?php 

session_start();
$emailUser = $_SESSION['userLoggedIn'];
$organisationId=$_SESSION['organisationId'];
/*echo $emailUser;
echo "<br>";
echo $organisationId;*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Being There - Add Admin</title>

    <!--  Fontawesome  -->
   <!-- <link href="../fontawesome/css/all.css" rel="stylesheet"> 
    <script defer src="../fontawesome/js/all.js"></script> -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
    <!--  Bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 

    <!-- Bootstarp ended -->

    <link rel="stylesheet" href="dashboard.css">

</head>
<style>
 
    /*    Add styles here  */
    form{
        margin-top:40px;
    }
    .form_row{
        position:relative;

    }
    .form_row input, select{
        padding-left:40px;
    }
    .form_row i{
        bottom:10px;
        position: absolute;
        padding-left:10px;
    }

</style> 
<body>

<!-- NavBar --> 
<div class="row">
<div class="col-lg-2">

<div id="navBarContainer">
    <nav class="navBar">
        <a href="index.php" class="logo">
            <img src="../img/user.png" style="width: 111px;margin-left: 27px;">
        </a>

        <div class="group">
            <div class="navItem">
               <!-- <a href="search.php" class="navItemLink">Search <img src="assets/images/icons/search.png" class="icon" alt="Search"></a> -->
            </div>
        </div>
        <div class="group">
            <div class="navItem" class="logo">
                <i class="fas fa-plus-circle" style="color:white;"></i>
                <a href="../admin/dashboard2.php" class="navItemLink" style="text-decoration: none;">Mark Attendance</a>
            </div>
            <div class="navItem" class="logo">
                <i class="fas fa-search-plus" style="color:white;"></i>
                <a href="../admin/viewAttendance.php" class="navItemLink" style="text-decoration: none;">View Attendance</a>
            </div>
            <div class="navItem" class="logo">
                <i class="fas fa-users navItemImage" style="color:white;"></i>
                <a href="../admin/employee.php" class="navItemLink" style="text-decoration: none;">Employees</a>
            </div>
            <div class="navItem" class="logo">
                <i class="fas fa-user-plus" style="color:white;"></i>
                <a href="../admin/addEmployee.php" class="navItemLink" style="text-decoration: none;">Add Employee</a>
            </div>
            <div class="navItem" class="logo">
                <i class="fas fa-user-shield navItemImage" style="color:white;"></i>
                <a href="../admin/admin.php" class="navItemLink" style="text-decoration: none;">Admin</a>
            </div>
            <div class="navItem" class="logo">
                <i class="fas fa-user-plus" style="color:white;"></i>
                <a href="../admin/addAdmin.php" class="navItemLink" style="text-decoration: none;">Add Admin</a>
            </div>
            <div class="navItem" class="logo">
                <i class="fas fa-chart-line" style="color:white;"></i>
                <a href="viewInsightsAdmin.php" class="navItemLink" style="text-decoration: none;">View Insights</a>
            </div>
            <div class="navItem" class="logo">
                <i class="far fa-user-circle" style="color:white;"></i>
                <a href="../admin/profileAdmin.php" class="navItemLink" style="text-decoration: none;">Your Profile</a>
            </div>
            <div class="navItem" class="logo">
                <i class="fas fa-sign-out-alt" style="color:white;"></i>
                <a href="../logout.php" class="navItemLink" style="text-decoration: none;">Logout</a>
            </div>
        </div>

    </nav>
</div>
</div>
<!-- NavBar ends-->

<div class="col-lg-10">
<div id="mainContainer"style="margin:auto 250px; width:50%;">

<!-- Fields to added in the form are 
    1.Admin id
    2.Admin Name
    3.gender
    4.email
    5.password
    6.DOB , but keep the input as text
    7.contact number
    -->
    <!-- Add the admin details form here -->
    <h4 class="text-center display-4">Add Admin</h4>
            
            <form  method="POST" action="" id="adminForm" >  
                <div class="md-form mb-3 form_row">
                    <i class="fas fa-id-card-alt"></i>
                    <input type="number" class="form-control" id="adminid" placeholer="Admin ID" name="adminid" required>
                </div>           
                <div class="md-form mb-3 form_row">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
                </div>
                <div class="md-form mb-3 form_row">
                    <div class="row">
                        <div class="col-sm-3">
                            <select class="form-control" name="gender" id="gender" style="padding:5px 10px;">
                                <option value="">Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-sm-4">           
                            <input type="text" class="form-control" id="dob" placeholder="dd-mm-yyyy" 
                            name="dob" required style="padding-left:20px;">
                        </div>
                        <div class="col-sm-5">
                            <i class="fa fa-mobile"></i>
                            <input type="tel" class="form-control " id="contactno" placeholder="Contact Number" name="contactno"   required>
                        </div>
                    </div>
                </div>
            
                <div class="md-form mb-3 form_row">
                    <i class="fas fa-envelope"></i>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email"   required>
                </div> 

                <div class="md-form mb-3 form_row">
                    <i class="fas fa-unlock-alt icon"></i>
                    <input type="password" class="form-control" id="pass" placeholder="Password" name="pass"   required>
                </div> 

                <div class="text-center">
                    <button type="submit" class="btn btn_action" name="addAdmin">Add admin</button>
                </div>
                
            </form>
</div>
</div>
</div>







    <!--  Bootstrap script files -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


<?php  include("../footer.php"); ?>

<?php 

if(isset($_POST['addAdmin'])){

 

    echo "
    
    <script>console.log('button pressed');</script>
    
    
    ";
    $adminid=$_POST['adminid'];
    $dobb=$_POST['dob'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contactno'];
    $gender=$_POST['gender'];
    $password=$_POST['pass'];
    echo "
    
    <script>console.log(".$gender.");</script>
    
    
    ";

$query=mysqli_query($con,"INSERT INTO admin_details VALUES('','$adminid','$name','$gender','$email','$password','$dobb','$contact','$organisationId')");

if($query){
    echo "
    
    <script>alert('Successfully added');</script>

";
    
}
else{
    echo "
    
    <script>alert('Something went Wrong');</script>

";
}





}










?>

