<?php include("../includes/handlers/config.php"); ?>


<?php 

session_start();
$emailUser = $_SESSION['userLoggedIn'];
$organisationId=$_SESSION['organisationId'];
/*echo $emailUser;
echo "<br>";
echo $organisationId;*/

?>
<?php 

$query_employee=mysqli_query($con,"SELECT * FROM employee_details WHERE organisation='$organisationId' AND email='$emailUser'");
$result_employee=mysqli_fetch_array($query_employee);
$employee_name=$result_employee['name'];
$employee_id=$result_employee['eid'];


?>

<?php 


$query1=mysqli_query($con,"select count(attendance) as present from attendance_taken where attendance='present' AND eid='$employee_id' AND organisation='$organisationId'");
$query2=mysqli_query($con,"select count(attendance) as absent from attendance_taken where attendance='absent' AND eid='$employee_id' AND organisation='$organisationId'");
$array1=mysqli_fetch_array($query1);
$array2=mysqli_fetch_array($query2);
$present=$array1['present'];
$absent=$array2['absent'];




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeingThere - View Insights</title>
<!--  Fontawesome  -->
<link href="../fontawesome/css/all.css" rel="stylesheet"> 
    <script defer src="../fontawesome/js/all.js"></script> 
    
    <!--  Bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 

    <!-- Bootstarp ended -->


    <!-- google Charts files-->






    <!-- google charts ended -->

    <link rel="stylesheet" href="../admin/dashboard.css">



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Present', <?php echo $present; ?>],
          ['Absent',   <?php echo $absent; ?>]
        ]);

        var options = {
          title: 'My Attendance',
          is3D: true,
          colors: ['#5cb85c', '#d9534f'],
          titleTextStyle: {
              
              fontSize: 18,
              bold: true
              
          }
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

        chart.draw(data, options);
      }
    </script>


</head>
<style>
 
    /*    Add styles here  */

</style> 
<body>

<!-- NavBar --> 

<div id="navBarContainer">
    <nav class="navBar">
        <a href="index.php" class="logo">
            <img src="../img/user.png" style="width: 111px;margin-left: 27px;">
        </a>

        <div class="group">
            <div class="navItem">
            </div>
        </div>
        <div class="group">
            <div class="navItem" class="logo">
            <i class="fas fa-plus-circle" style="color:white;"></i>
                <a href="../user/dashboard.php" class="navItemLink" style="text-decoration: none;">Attendance</a>
            </div>
          <!--  <div class="navItem" class="logo">
                <img src="../img/view.png" width=22px>
                <a href="../admin/viewAttendance.php" class="navItemLink" style="text-decoration: none;">View Attendance</a>
            </div> 
            <div class="navItem" class="logo">
            <img src="../img/employee.png" width=22px>
                <a href="../admin/employee.php" class="navItemLink" style="text-decoration: none;">Employees</a>
            </div>
            <div class="navItem" class="logo">
            <img src="../img/employee2.png" width=22px>
                <a href="../admin/admin.php" class="navItemLink" style="text-decoration: none;">Admin</a>
            </div>  -->
            <div class="navItem" class="logo">
            <i class="fas fa-chart-line" style="color:white;"></i>
                <a href="../user/viewInsights.php" class="navItemLink" style="text-decoration: none;">View Insights</a>
            </div>
            <div class="navItem" class="logo">
            <i class="far fa-user-circle" style="color:white;"></i>
                <a href="../user/profileUser.php" class="navItemLink" style="text-decoration: none;">Your Profile</a>
            </div>
            <div class="navItem" class="logo">
            <i class="fas fa-sign-out-alt navItemLink" style="color:white;"></i>
                <a href="../logout.php" class="navItemLink" style="text-decoration: none;">Logout</a>
            </div>
        </div>


    </nav>
</div>
<!-- NavBar ends-->


<div id="mainContainer">

<?php 

$query_employee=mysqli_query($con,"SELECT * FROM employee_details WHERE organisation='$organisationId' AND email='$emailUser'");
$result_employee=mysqli_fetch_array($query_employee);
$employee_name=$result_employee['name'];
$employee_id=$result_employee['eid'];


?>


<h2 class="display-3" style="text-align:center;margin:10px;">View Insights</h2>



<div id="mainContainer">



<div id="piechart_3d" style="width: 900px; height: 500px;margin-left:79px;"></div>










</div>








    <!--  Bootstrap script files -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>




















<?php  include("../footer.php"); ?>
