<?php
require "header.php";
require "./includes/projects.inc.php";
?>

<main>
<?php
if(isset($_SESSION['userId'])){
    $name=$_SESSION['userName'];
    echo "<p>You are logged in</p>
    <p>Welcome {$name} </p>";
}else {
    echo '<p>You are not logged in </p>';
}
?>
 
 
</main>


<?php
require "footer.php";

?>