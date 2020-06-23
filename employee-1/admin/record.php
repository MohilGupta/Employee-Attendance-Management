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

 if(isset($_POST['submitButton'])) {

 

    $query = "INSERT INTO `attendance_taken`(`eid`, `name`, `date`, `attendance`,`organisation`) VALUES";
        for($i=0;$i<$_POST['numbers'];$i++)
        {
            $query .="('".$_POST['eid'][$i]."','".$_POST['name'][$i]."','".$_POST['date'][$i]."','".$_POST['attendance'][$i]."','".$organisationId."'),";
            // appending with the query 
        }
        $query = rtrim($query,",");


    if (mysqli_query($con,$query))
    {
    ?>
    <script>
            if(!alert('Attendance added successfully!')){window.location = "dashboard2.php";}
    
    </script>
    <?php
        } 
    else {
        ?>
        <script>
            if(!alert('Can not add attendance.Some error occured')){window.location = "dashboard2.php";}
    
        </script>
    <?php
    }
    

    
  
  }

?>