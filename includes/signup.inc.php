<?php

 if (isset($_POST['signup-submit'])){

    //code....
     require 'dbh.inc.php';

    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['pwd_repeat'];

if(empty($firstname)||empty($lastname)||empty($email)||empty($phone)||empty($password)){
    header("Location: ../signup.php?error=emptyfields&firstname=".$firstname."&lastname=".$lastname);
    exit();
}
// else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
//     header("Location: ../signup.php?error=invalidemail&email=".$email);
//     exit();
// }
// else if($password !== $confirmPassword){
//     header("Location: ../signup.php?error=passwordcheck&email=".$email);
//     exit();
// }

else {

    $sql="SELECT email from engineers WHERE email=?";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../signup.php?error=sqlerror");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck=mysqli_num_rows($stmt);

        if ($resultCheck >0){
            header("Location: ../signup.php?error=useralreadyexists&email=".$email);
            exit();
        }
        else{
            $sql="INSERT INTO engineers (firstName,lastName,email,phone,passwrd) VALUES (?,?,?,?,?);";
            $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)){
                header('Location: ../signup.php?error=sqlerror');
                exit();
            }
            else{
                $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt,"sssss",$firstname,$lastname,$email,$phone,$hashedPassword);
                mysqli_stmt_execute($stmt);
                header("Location: ../signup.php?signup=success");   
                exit();             
            }
        }
    }

}
mysqli_stmt_close($stmt);
mysqli_close($conn);

 }

else{
    header("Location:../signup.php");
    exit();
}
 