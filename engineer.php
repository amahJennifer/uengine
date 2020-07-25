
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
<div class="jumbotron">
  <h1 class="display-4">Hello,<?=$name?></h1>
  <p class="lead">View Engineers, Track Engineer's Progress</p>
  <hr class="my-3">
  <p>You can assign a project to an Engineer.</p>
  <div class="mt-5">
     <a class="learnmore-btn" href="#" role="button">Learn more</a>
  </div>
 
</div>
<?php

$mysqli= new mysqli('localhost','root','1527','uengine') or die(mysqli_error($mysqli));
$engines=$mysqli->query("SELECT * FROM engineers") or die(mysqli_error($mysqli)) ;
    // echo $row['project_description'];
?>

    <div class="container">



        <table id="t01">
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name </th> 
            <th>Email </th> 
            <th>Phone</th>
        </tr>


        <?php while($row=$engines->fetch_assoc()) :?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['firstName'];?></td>
                    <td><?php echo $row['lastName'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['phone'];?></td>
                
                </tr>

        <?php endwhile ;?>  

        </table>
    </div>


 
</main>


<?php
require "footer.php";

?>

