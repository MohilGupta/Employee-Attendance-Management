<?php  
include("config.php");
//echo "Hello Mohil";


if(isset($_GET['email']) && isset($_GET['token'])){
    $email=$_GET['email'];
    $token=$_GET['token'];
    echo $email."<br>";
    echo $token."<br>";
    $rows=mysqli_query($con,"SELECT id FROM organisations WHERE email='$email' AND token='$token' AND emailverified=0");
    $array=mysqli_fetch_array($rows);
    echo $array['id'];
    echo mysqli_num_rows($rows);
    if(mysqli_num_rows($rows) > 0){
       $query = mysqli_query($con,"UPDATE organisations SET emailverified=1 , token='' WHERE email='$email'");
       if($query){
        echo "<script>alert('email successfully verified');</script>";
        header("Location:http://localhost:8080/internship-project-folder-1/employee-1/index.php");
     // aditya's part   header("Location:http://localhost/internship-project-folder/employee-1/index.php");
       }
    }
    else{
        echo "<script>alert('email verification failed');</script>";
    }

}
else{
    echo "<script>alert('Something went wrong');</script>";
}



?>

