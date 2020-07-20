<?php
require "header.php";
?>

<main>
<div>
<section>
<h1>SignUp</h1>
<?php
    if(isset($_GET['error'])){
        if($_GET['error']=="emptyfields"){
            echo '<p style="color:red;">Fill in all fields </p>';
        }
    }else if(isset($_GET['signup'])){
        if($_GET['signup']=="success")
        echo '<p style="color:green;">Signed up Successfully </p>';
    }

?>

    <form action="includes/signup.inc.php" method="post">
            <input type="text" name="firstname" placeholder="FirstName">
            <input type="text" name="lastname" placeholder="lastName">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="phone" placeholder="phone">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="pwd-repeat" placeholder="Confirm Password">
            <button type="submit" name="signup-submit">Signup</button>
        </form>
</section>
   
</div>
  
</main>


<?php
require "footer.php";
?>