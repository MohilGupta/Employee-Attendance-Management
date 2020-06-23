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


if(isset($_POST['retake'])){
    $query=mysqli_query($con,"DELETE FROM attendance_taken WHERE organisation='$organisationId' AND date='$ThisDate'");
    if($query){
        header("Location:dashboard2.php");
    }
    else{
        echo "
        
        <script>
        
        alert('Something went wrong');
        
        </script>
        
            ";
    }
}



?>