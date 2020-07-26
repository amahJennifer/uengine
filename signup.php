<?php
require "header.php";
?>

<main>
<div>
<section>
<div class="container w-50 mt-5">
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
             <div class="form-group"> 
                <label for="firstname">First Name</label>
                <input class="form-control" type="text" name="firstname" placeholder="FirstName">
            </div>
             <div class="form-group"> 
                <label for="lastname">Last Name</label>
                <input class="form-control" type="text" name="lastname" placeholder="LastName">
            </div>
             <div class="form-group"> 
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" placeholder="Email">
            </div>
             <div class="form-group"> 
                <label for="phone">Phone</label>
                <input class="form-control" type="text" name="phone" placeholder="Phone">
            </div>
             <div class="form-group"> 
                <label for="phone">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
             <div class="form-group"> 
                <label for="phone">Confirm Password</label>
                 <input class="form-control" type="password" name="pwd-repeat" placeholder="Confirm Password">
            </div>
            
            <button class="signup-btn" type="submit" name="signup-submit">Signup</button>
        </form>

        </div>
</section>
   
</div>
  
</main>
