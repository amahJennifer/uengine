
<?php
require "header.php";
?>

<main>
<?php
if(isset($_SESSION['userId'])){
    $name=$_SESSION['userName'];
    $adminStatus=$_SESSION['adminStatus'];
    if($adminStatus==true){
         echo "
    <p>Welcome Admin {$name} </p>";
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
 

 
 
</main>


<?php
require "footer.php";

?>