<?php 

use PHPMailer\PHPMailer\PHPMailer;


function register($org,$add,$email,$mobile,$city,$state,$password,$token,$con){
    $encryptedPassword=md5($password);
    $email_exists=mysqli_query($con,"SELECT * FROM organisations WHERE email='$email'");
    if(mysqli_num_rows($email_exists)>0){
      return false;
    }
    $result=mysqli_query($con,"INSERT INTO organisations VALUES ('','$org','$email','$mobile','$add','$city','$state','$encryptedPassword','$token',0)");
    return $result;

}
 
if(isset($_POST['registerButton'])){
    //echo "<h1> register button was pressed </h1>";

    $organisation=$_POST['organisation'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $password=$_POST['password'];
    //$password=$_POST['repassword'];
    $token="qwerfdsSDFWEFVRVCrwrefuvbev124t35t5eev0024r248r35ervb9230r24v";
    $token=str_shuffle($token);
    $token=substr($token,0,10);

    $successfulRegistration=register($organisation,$address,$email,$mobile,$city,$state,$password,$token,$con);
    if($successfulRegistration==false){
        echo "
        
        <script>
        
        alert('Email already exists');
        
        location.assign('index.php');
        
        </script>
        
        ";
       // header("Location:index.php");
    }
    if($successfulRegistration){
        echo "<script>
        
            alert('registration successful');
        </script>";

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";



        $subject="email verfication";
        $mail=new PHPMailer();
        $mail->isSMTP();
        $mail->Host="smtp.gmail.com";
        $mail->SMTPAuth=true;
        $mail->Username="beingtherebuisness@gmail.com";   
        $mail->Password="beingthere#123";                
        $mail->Port=465;
        $mail->SMTPSecure="ssl";
    
        // email setings
        $mail->isHTML(true);
        $mail->setFrom("beingtherebuisness@gmail.com");   
        $mail->addAddress($email);
        $mail->Subject=$subject;
        $mail->Body=  "
        
        Please click on the link below : <br><br>

          <a href='http://localhost:8080/internship-project-folder-1/employee-1/includes/handlers/emailVerification.php?email=$email&token=$token'>Click Here</a>
        
        "; 
  
      /* aditya's part  <a href='http://localhost/internship-project-folder/employee-1/includes/handlers/emailVerification.php?email=$email&token=$token'>Click Here</a>
        
        "; */

    
    
     if($mail->Send()){
            echo "mail sent";
        }
        else{
            echo "Something went wrong";
        } 








    }
}



?>
