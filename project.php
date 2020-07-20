
<?php
require "header.php";
    include './includes/projects.inc.php';
?>

<main>
<?php

if(isset($_SESSION['userId'])){
    $name=$_SESSION['userName'];
    $adminStatus=$_SESSION['adminStatus'];
    if($adminStatus==true){
         echo "
    <p>Welcome Admin {$name} </p> ";
    
   
    }else{
        session_start();
        session_unset();
        session_destroy();

        header("Location: ../index.php");
        exit();
    }
   
}else {
    echo '<p>You are not logged in </p>';
    exit();
}
?>
<?php

$mysqli= new mysqli('localhost','root','1527','uengine') or die(mysqli_error($mysqli));
$pro=$mysqli->query("SELECT * FROM projects") or die(mysqli_error($mysqli)) ;
    // echo $row['project_description'];
?>
<table id="t01">
  <tr>
    <th>Id</th>
    <th>Project Title</th>
    <th>Project Description</th> 
    <th>Engineers Assigned </th> 
    <th>Project Deadline</th>
  </tr>


<?php while($row=$pro->fetch_assoc()) :?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><a href="#"><?php echo $row['project_title'];?></a></td>
            <td><?php echo $row['project_description'];?></td>
            <td><?php echo $row['project_eng'];?></td>
            <td><?php echo $row['project_deadline'];?></td>
         
        </tr>

<?php endwhile ;?>  

</table>

<div>
    <p>Add projects</p>
    <form action="includes/project.inc.php" method="post">
                    <input type="text" name="projectTitle" placeholder="Project Title">
                    <input type="text" name="projectDescription" placeholder="Description">
                    <input type="date" name="projectDeadline" placeholder="Deadline">
                    <button type="submit" name="create-project">Create Project</button>
                </form>
</div>

 
</main>


<?php
require "footer.php";

?>

