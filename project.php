
<?php
require "header.php";
?>

<main>
<?php

        if(isset($_SESSION['userId'])){
            $name=$_SESSION['userName'];
            $adminStatus=$_SESSION['adminStatus'];
            if($adminStatus==!true){
                
            session_start();
                    session_unset();
                    session_destroy();

                    header("Location: ../index.php");
                    exit();
            }
        }
?>
        <div class="jumbotron">
            <h1 class="display-4">Hello,<?=$name?></h1>
            <p class="lead">This is your Project Board , a simple project board to track project and engineers.</p>
            <hr class="my-3">
            <p>You can create a project or add engineers to new or existing Projects.</p>
            <div class="mt-5">
                <a class="learnmore-btn" href="#" role="button">Learn more</a>
            </div>
        
        </div>
<?php

$mysqli= new mysqli('localhost','root','1527','uengine') or die(mysqli_error($mysqli));
$pro=$mysqli->query("SELECT * FROM projects") or die(mysqli_error($mysqli)) ;

?>

    <div class="container">

    <button class="signup-btn mb-2" onclick="toggleDiv()">Create new Project</button>
    <div id="create-p" style="display:none" class="createproject mb-3">
        <h3>Add project</h3>
            <form action="includes/project.inc.php" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="projectTitle" placeholder="Project Title">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="projectDescription" placeholder="Description">
                </div>
                <div class="form-group">
                    <input class="form-control" type="date" name="projectDeadline" placeholder="Deadline">
                </div>            
                    <button class="signup-btn" type="submit" name="create-project">Create Project</button>
            </form>

    </div>  

        <table id="t01">
        <tr>
            <th>Id</th>
            <th>Project Title</th>
            <th>Project Description</th> 
            <th>Engineers Assigned </th> 
            <th>Project Deadline</th>
            <th>Assign Engineers</th>
        </tr>
                        

        <?php while($row=$pro->fetch_assoc()) :?>
                <tr>     
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['project_title'];?></a></td>
                    <td><?php echo $row['project_description'];?></td>
                    <td><?php echo $row['project_eng'];?></td>
                    <td><?php echo $row['project_deadline'];?></td>
                    <td><a href="assign.php?projectid=<?=$row['id']?>"><button class="signup-btn">Assign Engineers</button></a></td>
                </tr>

        <?php endwhile ;?>  

        </table>
         


 
</main>


