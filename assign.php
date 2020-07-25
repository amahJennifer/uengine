<?php
require "header.php";
require "./includes/projects.inc.php";
$projectname="";
?>
<?php

$mysqli= new mysqli('localhost','root','1527','uengine') or die(mysqli_error($mysqli));
$engines=$mysqli->query("SELECT * FROM engineers") or die(mysqli_error($mysqli)) ;
    
?>
<main>
<?php

if(isset($_SESSION['userId'])){
    $name=$_SESSION['userName'];
    $adminStatus=$_SESSION['adminStatus'];
   
}else {
    header("Location: ../index.php");
    exit();
}
if(isset($_SESSION['project_title'])){
    $projectname=$_SESSION['project_title'];
}
?>
<div class="jumbotron">
  <h1 class="display-4">Hello,<?=$name?></h1>
  <p class="lead">View Engineers, Track Engineer's Progress</p>
  <hr class="my-3">
  <p>Assign Engineers to the  <?=$projectname?> Project </p>
  <div class="mt-5">
     <a class="learnmore-btn" href="#" role="button">Learn more</a>
  </div>
 
</div>

<div class="container">

<table id="t01">
<tr>
    <th>Id</th>
    <th>First Name</th>
    <th>Last Name </th> 
    <th>Email </th> 
    <th>Phone</th>
    <th>Assign</th>
</tr>

<h3>Engineers</h3>

<?php
    if(isset($_GET['assign'])){
        $sucess_msg="Successfully Added Engineer";
    }else {
        $sucess_msg="";
    }
?>

<span style="color:green;"><?="{$sucess_msg}"?></span>
<span style="color:green;"><?="{$resultCount}"?></span>


<?php while($row=$engines->fetch_assoc()) :?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['firstName'];?></td>
            <td><?php echo $row['lastName'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td> <a href="assign.php?engineer_id=<?=$row['id']?>"><button class="signup-btn" name="add_engineer">Add</button></a></td>
        </tr>

<?php endwhile ;?>  
</table>
  
</div>
</main>




<?php
require "footer.php";

?>