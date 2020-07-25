<?php
require "../header.php";
require "./process.php";
?>

<main>
<?php
if(isset($_SESSION['userId'])){
    $name=$_SESSION['userName'];
}
?>
 <div class="jumbotron">
  <h1 class="display-4">Hello,<?=$name?></h1>
  <p class="lead">View Projects you are working on </p>
  <hr class="my-3">
  <p>Checkout Project Deadline and Details </p>
  <div class="mt-5">
     <a class="learnmore-btn" href="#" role="button">Learn more</a>
  </div>
 
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
 <!-- The Modal -->
                        

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


<?php
require "../footer.php";

?>