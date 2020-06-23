<?php 

session_start();
$emailUser = $_SESSION['userLoggedIn'];
$organisationId=$_SESSION['organisationId'];
/*echo $emailUser;
echo "<br>";
echo $organisationId;*/

?>
<?php

include("../includes/handlers/config.php");

if(isset($_GET['delete'])){
    $deleteId=$_GET['delete'];   // getting the album id using the GET method 
 }
 else{
     echo "ID not passed";
 }


 $query=mysqli_query($con,"DELETE FROM admin_details WHERE eid='$deleteId' AND organisation='$organisationId'");
 //$query2=mysqli_query($con,"DELETE FROM attendance_taken WHERE eid='$deleteId' AND organisation='$organisationId'");


 if($query){
     ?>
     <script>
          if(!alert('Employee deleted successfully!')){window.location = "admin.php";}
     </script>
 <?php } ?>   <!--if block ended here -->





