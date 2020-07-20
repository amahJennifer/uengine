<?php
    // define ('PROJECTNAME','Project Name');
    
    if (isset($_POST['create-project'])){

        //code....
        require 'dbh.inc.php';
       

        $projectTitle=$_POST['projectTitle'];
        $projectDescription=$_POST['projectDescription'];
        $projectDeadline=$_POST['projectDeadline'];

        
        if(empty($projectTitle)||empty($projectDescription)||empty($projectDeadline)){
            header("Location: ../project.php?error=emptyfields&projectTitle=".$projectTitle."&projectDeadline=".$projectDeadline."&projectDescription=".$projectDescription);
            exit();
        }
        else {
            
            $sql="SELECT project_title from projects WHERE project_title=?";
            $stmt= mysqli_stmt_init($conn);
            echo "uencue";
            if (!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../project.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt,"s",$projectTitle);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck=mysqli_num_rows($stmt);
        
                if ($resultCheck >0){
                    header("Location: ../project.php?error=projectalreadyexists&projectDescription=".$projectDescription);
                    exit();
                }
                else{
                    
                    
                    $sql="INSERT INTO projects (project_title,project_description,project_deadline) VALUES (?,?,?);";
                    $stmt=mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt,$sql)){
                        header('Location: ../project.php?error=sqlerror');
                        exit();
                    }
                    else{
                       
                        mysqli_stmt_bind_param($stmt,"sss",$projectTitle,$projectDescription,$projectDeadline);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../project.php?projectcreated=success");   
                        exit();             
                    }
                }
            }
        
        }
    }
    else{
        header("Location:../index.php");
        exit();
    }



// require '../project.php';
?>


<h1>werthjklsdfvbnfgh</h1>