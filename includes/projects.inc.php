<?php
require "dbh.inc.php";

    $e_id="";
    $project_id="";
    
    if(isset($_GET['projectid'])){
       $project_id=$_GET['projectid'];
       $mysqli= new mysqli('localhost','root','1527','uengine') or die(mysqli_error($mysqli));
       $project=$mysqli->query("SELECT * FROM projects WHERE id=$project_id") or die(mysqli_error($mysqli)) ;
       $project=$project->fetch_assoc();

       session_start();
       $_SESSION['project_id'] =$project['id'];
       $_SESSION['project_title'] =$project['project_title'];
       $_SESSION['project_eng'] =$project['project_eng'];
       
    }

     if (isset($_GET['engineer_id'])){
       $e_id=$_GET['engineer_id'];
       $p_id=$_SESSION['project_id'];

       $sql="SELECT * from project_eng WHERE project_id=$p_id AND engineer_id=$e_id;";
      
       $stmt = mysqli_stmt_init($conn);
       mysqli_stmt_bind_param($stmt,"ii",$p_id,$e_id);

       if (!mysqli_stmt_prepare($stmt,$sql)){
           header('Location: ./assign.php?error=sqlerror');
           exit();
       }
       else {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCount=mysqli_num_rows($stmt);
        echo "{$resultCount}";
        if ($resultCount>0){
            header('Location: ./assign.php?error=engineerAlreadyExists');
            exit();
        }
        else {
            $engineCount=$_SESSION['project_id'] + 1;
            $sql="INSERT INTO project_eng (project_id,engineer_id) VALUES (?,?); " ;
            $sql2=" UPDATE projects SET project_eng=$engineCount + 1 WHERE id =?;" ;

            $stmt=mysqli_stmt_init($conn);
            $stmt2=mysqli_stmt_init($conn);
            
                if (!mysqli_stmt_prepare($stmt2,$sql2)){
                    header('Location: ./assign.php?error=sqlerror');
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt2,"i",$project_id);
                    mysqli_stmt_execute($stmt2);          
                }

                if (!mysqli_stmt_prepare($stmt,$sql)){
                    header('Location: ./assign.php?error=sqlerror');
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt,"ii",$p_id,$e_id);

                    mysqli_stmt_execute($stmt);
                    header("Location: ./assign.php?assign=success");   
                    exit();             
                }
                

        }
       }


       
    }

   
    
    
            
        
     
    

