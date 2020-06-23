<?php 

function login($email,$password,$con){
    $pass=md5($password);

    $query=mysqli_query($con,"SELECT * FROM organisations WHERE email='$email' AND password='$pass'");
    if(mysqli_num_rows($query)==1){
       return true;
    }
    return false;
}

function loginAdmin($email,$password,$con){

    $query=mysqli_query($con,"SELECT * FROM admin_details WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($query)==1){
        return true;
    }

}

function loginUser($email,$password,$con){
    $query=mysqli_query($con,"SELECT * FROM employee_details WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($query)==1){
        return true;
    }
}

if(isset($_POST['login'])){



    $email=$_POST['email'];
    $password=$_POST['password'];
/*    $query=mysqli_query($con,"SELECT id FROM organisations WHERE email='$email'");
    $array=mysqli_fetch_array($query);
    $id=$array['id'];  */

   

   $wasSuccessful=login($email,$password,$con);

    
    if($wasSuccessful==true){
        $query=mysqli_query($con,"SELECT id FROM organisations WHERE email='$email'");
        $array=mysqli_fetch_array($query);
        $id=$array['id'];
        session_start();
        $_SESSION['userLoggedIn']=$email;
        $_SESSION['organisationId']=$id;
        header("Location:admin/dashboard2.php");
    } 
    else if($wasSuccessful==false){
        $success=loginAdmin($email,$password,$con);
        $query=mysqli_query($con,"SELECT organisation FROM admin_details WHERE email='$email'");
        $array=mysqli_fetch_array($query);
        $id=$array['organisation'];
        if($success){
            session_start();
            $_SESSION['userLoggedIn']=$email;
            $_SESSION['organisationId']=$id;
            header("Location:admin/dashboard2.php");
        }
        if($success==false){
            $successUser=loginUser($email,$password,$con);
            $query=mysqli_query($con,"SELECT organisation FROM employee_details WHERE email='$email'");
            $array=mysqli_fetch_array($query);
            $id=$array['organisation'];
            if($successUser){
                session_start();
                $_SESSION['userLoggedIn']=$email;
                $_SESSION['organisationId']=$id;
                header("Location:user/dashboard.php");
            }
        }

        else{
     
        echo "<script>alert('login failed');</script>";
        //header("Location:index.php");
        }

    }


}









?>
