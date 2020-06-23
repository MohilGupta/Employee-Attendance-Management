<?php 

session_start();
$emailUser = $_SESSION['userLoggedIn'];
$organisationId=$_SESSION['organisationId'];
/*echo $emailUser;
echo "<br>";
echo $organisationId;
*/
?>
<?php 

include("../includes/handlers/config.php");

?>

<?php 

if(isset($_POST['date_btn'])){
    $date=$_POST['date'];
}

?>




<?php  



$query1=mysqli_query($con,"select count(attendance) as present from attendance_taken where attendance='Present' AND organisation='$organisationId'");
$query2=mysqli_query($con,"select count(attendance) as absent from attendance_taken where attendance='Absent' AND organisation='$organisationId'");
$array1=mysqli_fetch_array($query1);
$array2=mysqli_fetch_array($query2);
$present=$array1['present'];
$absent=$array2['absent'];





?>
<?php



$query_employee=mysqli_query($con,"SELECT count(eid) as employee FROM employee_details WHERE organisation='$organisationId'");
$query_admin=mysqli_query($con,"SELECT count(eid) as admin FROM admin_details WHERE organisation='$organisationId'");
$array_employee=mysqli_fetch_array($query_employee);
$array_admin=mysqli_fetch_array($query_admin);
$employee=$array_employee['employee'];
$admin=$array_admin['admin'];
$total=$employee + $admin;






?>
<?php
$query_toady_present=mysqli_query($con,"SELECT COUNT(attendance) AS present FROM attendance_taken WHERE date='$ThisDate' AND attendance='Present' AND organisation='$organisationId'");
$query_toady_absent=mysqli_query($con,"SELECT COUNT(attendance) AS absent FROM attendance_taken WHERE date='$ThisDate' AND organisation='$organisationId' AND attendance='Absent'");

$array_today_present=mysqli_fetch_array($query_toady_present);
$array_today_absent=mysqli_fetch_array($query_toady_absent);

$today_present=$array_today_present['present'];
$today_absent=$array_today_absent['absent'];
?>
<?php

$query_date_present=mysqli_query($con,"SELECT COUNT(attendance) AS present FROM attendance_taken WHERE date='$date' AND attendance='Present' AND organisation='$organisationId'");
$query_date_absent=mysqli_query($con,"SELECT COUNT(attendance) AS absent FROM attendance_taken WHERE date='$date' AND organisation='$organisationId' AND attendance='Absent'");

$array_date_present=mysqli_fetch_array($query_date_present);
$array_date_absent=mysqli_fetch_array($query_date_absent);

$date_present=$array_date_present['present'];
$date_absent=$array_date_absent['absent'];

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
 


    <!-- new links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="dashboard.css">

    <!-- graphs  -->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Attendance', 'Status'],
          ['Present', <?php echo $date_present; ?>],
          ['Absent',   <?php echo $date_absent; ?>]
        ]);

        var options = {
          title: "Total Attendance",
         
          colors: ['#5cb85c', '#d9534f'],
          pieHole: 0.4,
          titleTextStyle: {
              
                fontSize: 18,
                bold: true
                
            }
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>




</head>
<style>

      #total{
        background: #EEEEEE;
        height: 130px;
       
        border-radius: 33px;
       
      }
      #admin{
        background: #EEEEEE;
        height: 130px;
       
        border-radius: 33px;
      
        
      }
      #IT{
        background: #EEEEEE;
        height: 130px;
       
        border-radius: 33px;
       
        
      }
      #HR{
        background: #EEEEEE;
        height: 130px;
      
        border-radius: 33px;
       
        
      }
      .form_date{
            display:flex;
            justify-content:center;
            margin-right:-9px;
        }
        form{
           
            width:30%;
            padding:20px;
            
            background-color:#EEEEEE;"
        }
        .btn_action{
            margin:0;
        }
</style> 
<body>

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





<div id="mainContainer" style="margin-top:20px;">
<div class="row" style="margin:auto 10px;">
<div class="col-sm-3">

<div id="total">
        <p style="text-align: center;
            font-size: -webkit-xxx-large;
            font-weight: bold;
            position: relative;
            top: 12px;">
            
            <?php echo $total; ?>
            
            </p>
        <p style="text-align:center;">Total employee</p>


</div>
</div>


<div class="col-sm-3">

<div id="admin">
    <p style="text-align: center;
        font-size: -webkit-xxx-large;
        font-weight: bold;
        position: relative;
        top: 12px;">

        <?php  echo $admin; ?>
        </p>

    <p style="text-align:center;">Total Admin</p>

</div>
    </div>
    <div class="col-sm-3">

<div id="IT">
    <p style="text-align: center;
        font-size: -webkit-xxx-large;
        font-weight: bold;
        position: relative;
        top: 12px;">

        <?php 
        
        $query_IT=mysqli_query($con,"SELECT count(department) as IT from employee_details where department='IT' AND organisation='$organisationId'");
        $array_IT=mysqli_fetch_array($query_IT);
        $IT=$array_IT['IT'];
        echo $IT;
        
        
        ?>
        </p>
        
    <p style="text-align:center;">IT</p>

</div>
    </div>
    <div class="col-sm-3">

<div id="HR">
    <p style="text-align: center;
        font-size: -webkit-xxx-large;
        font-weight: bold;
        position: relative;
        top: 12px;">

        <?php  echo ($total-($IT+$admin)); ?>
        </p>
        
    <p style="text-align:center;">HR</p>

</div>

    </div>
    </div>

<div id="donutchart" style="width: 600px; height: 500px;float:left;margin-left:427px;"></div>




</div>




<?php  include("../footer.php"); ?>
