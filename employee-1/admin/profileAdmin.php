<?php 

session_start();
$emailUser = $_SESSION['userLoggedIn'];
$organisationId=$_SESSION['organisationId'];
/*echo $emailUser;
echo "<br>";
echo $organisationId;*/

?>
<?php include("../includes/handlers/config.php"); ?>

<?php 

$query=mysqli_query($con,"SELECT * FROM admin_details WHERE email='$emailUser' AND organisation='$organisationId'");
if(mysqli_num_rows($query)==0){
    header("Location:superadmin.php");
}
$query_name=mysqli_query($con,"SELECT organisation FROM organisations WHERE id='$organisationId'");
$array=mysqli_fetch_array($query);
$eid=$array['eid'];
$array_name=mysqli_fetch_array($query_name);
$organisation_name=$array_name['organisation'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeingThere - Your Profile</title>

    <!--  Fontawesome  -->
    <link href="../fontawesome/css/all.css" rel="stylesheet"> 
    <script defer src="../fontawesome/js/all.js"></script> 
    
    <!--  Bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 


    <link rel="stylesheet" href="dashboard.css">


</head>
<style>
 
    /*    Add styles here  */
    .profile_div{
        margin-top:40px;
    }
    .div_row{
        padding:0 20px;
        background-color:red;
        clear:both;
        background-color:#F4F0F9 !important;
        margin-top:10px;
    }

    .field_value{
        margin-top:10px;
        color:black;
        border-left:1px solid black;
        float:left;
        padding:0 10px;
        background-color:#F4F0F9 ;
        min-width:65%;
    }
   
    .field_name{
        margin-top:10px;
        float:left;
        background-color:#EEEEEE; 
        padding:0 10px;
        min-width:35%;
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
                
                <a href="../logout.php" class="navItemLink" style="text-decoration: none;">
                    <span class="fas fa-sign-out-alt navItemLink" style="color:white;"></span>
                    Logout
                </a>
            </div>
        </div>


    </nav>
</div>


</div>


    <!-- NavBar ends-->

<div class="col-lg-10">
<div id="mainContainer" style="margin:auto 250px; width:50%;">

<!-- Profile of the comes here -->
    <h4 class="text-center display-4" style="margin-top:10px;">Profile</h4>
    <form action="" method="POST">
            
    <div class="profile_div">
        <div class="div_row">
            <div class="field_name"> <h4>Organisation</h4></div>
            <div class="field_value"> <h4><?php echo $organisation_name; ?></h4></div>
        </div> 
        <div class="div_row">
            <div class="field_name"> <h4>ID</h4></div>
            <div class="field_value"> <h4><?php echo $array['eid']; ?></h4></div>
        </div> 
        
        <div class="div_row">
            <div class="field_name"> <h4>Name</h4></div>
            <div class="field_value"> <h4><?php echo $array['name']; ?></h4></div>
        </div> 
        
        <div class="div_row">
            <div class="field_name"> <h4>Gender</h4></div>
            <div class="field_value"> <h4><?php echo $array['gender']; ?></h4></div>
        </div> 
        <div class="div_row">
            <div class="field_name"> <h4>Email</h4></div>
            <div class="field_value"> <h4><?php echo $array['email']; ?></h4></div>
        </div> 

        <div class="div_row">
            <div class="field_name"> <h4>DOB</h4></div>
            <div class="field_value"> <h4><?php echo $array['DOB']; ?></h4></div>
        </div>  
        <div class="div_row">
            <div class="field_name"> <h4>Contact Number</h4></div>
            <div class="field_value"> <h4><?php echo $array['contact_no']; ?></h4></div>
        </div> 
        <div class="div_row">
            <div class="field_name"> <h4>Password</h4></div>
            <div class="field_value"> <h4><input type="password" name="password" value=<?php echo $array['password']; ?> name=""></h4></div>
        </div> 

    </div>
    <button class="btn btn-primary btn-lg" name="update" style="margin-top:28px;margin-left: 276px;">Update</button>
    </form>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<?php include("../footer.php"); ?>



<?php

if(isset($_POST['update'])){
    $password=$_POST['password'];
    $update=mysqli_query($con,"UPDATE admin_details SET password='$password' WHERE email='$emailUser' AND organisation='$organisationId'");
    if($update){
        echo "<script>alert('Password Changed Successfully');</script>";
    }
    else{
        echo "<script>alert('Something went Wrong');</script>";
    }
}


?>