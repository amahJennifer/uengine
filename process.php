<?php
if(isset($_SESSION['userId'])){
    $engineer_id=$_SESSION['userId'];
}

$mysqli= new mysqli('localhost','root','1527','uengine') or die(mysqli_error($mysqli));
$eng_projects=$mysqli->query("SELECT * FROM project_eng WHERE engineer_id=$engineer_id") or die(mysqli_error($mysqli)) ;



