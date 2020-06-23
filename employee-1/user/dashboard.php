<?php 

session_start();
$emailUser = $_SESSION['userLoggedIn'];
$organisationId=$_SESSION['organisationId'];
/*echo $emailUser;
echo "<br>";
echo $organisationId;
*/
?>
<?php include("../includes/handlers/config.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeingThere - Dashboard</title>

   <!--  Fontawesome  -->
   <link href="../fontawesome/css/all.css" rel="stylesheet"> 
    <script defer src="../fontawesome/js/all.js"></script> 
    
    <!--  Bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 
    
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 
    <!-- datatables files-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">








    <!--datatables file ended -->


    <!-- Bootstarp ended -->

    <link rel="stylesheet" href="../admin/dashboard.css">


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


<h2 class="display-3" style="text-align:center;margin:10px;">View Attendance</h2>
<a href="generatepdf.php" target="_blank" class="btn btn_action" style="margin-left: 580px;">Download PDF</a>






<table id="example" class="table table-striped table-bordered " cellspacing="0"   style="
    margin-left:18px;
    margin-top:100px;
    width: 99%;">
    <thead>
      <tr>
        <th>Employee Id</th>
        <th>Name</th>
        <th>Attendance</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>

    <?php 

    $query=mysqli_query($con,"SELECT * FROM attendance_taken WHERE organisation='$organisationId' AND eid='$employee_id'");
    while($row=mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $row['eid']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td>
                
                <?php 


                    if($row['attendance']=="Present"){
                        echo "<button type='button' class='btn btn-success'>".$row['attendance']."</button>";
                    } 
                    else{
                        echo "<button type='button' class='btn btn-danger'>".$row['attendance']."</button>";
                    }
                    
                    
                ?>
            </td>
            <td><?php echo $row['date']; ?></td>
            
        </tr>
    

    <?php }  ?>










</div>








    <!--  Bootstrap script files -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>





    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script>
   
          /* $(document).ready(function() {
                $('#example').DataTable( {
                    autoWidth: false,
                    columnDefs: [
                        {
                            targets: ['_all'],
                            className: 'mdc-data-table__cell'
                        }
                    ]
                } );
            } ); */


            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>  




















<?php  include("../footer.php"); ?>
