<?php

if(isset($_POST['login-submit'])){
    require 'dbh.inc.php';

    $email=$_POST['email'];
    $password=$_POST['password'];

    if(empty($email)|| empty($password) ){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }else{
        $sql="SELECT * from engineers WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if ($row=mysqli_fetch_assoc($result)){
                $pwdCheck=password_verify($password,$row['passwrd']);
                if($pwdCheck==false){
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }else if($pwdCheck=true){
                    session_start();
                    $_SESSION['userId'] =$row['id'];
                    $_SESSION['userEmail'] =$row['email'];
                    $_SESSION['userName'] =$row['firstName'];
                    $_SESSION['adminStatus'] =$row['is_admin'];

                    if ($row['is_admin']==true){
                        header("Location: ../project.php?login=success");
                    exit();
                    }
                    else{
                        header("Location: ../projects.php?login=success");
                        exit();
                    }
                }
            }else{
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }

}else{
    header("Location: ../index.php");
    exit();
}



