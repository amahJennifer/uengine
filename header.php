<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./styles/styles.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">
            <p>Uengine</p>
        </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav mr-auto">
           <?php
           if (isset($_SESSION['adminStatus'])){
                $adminStatus = $_SESSION['adminStatus'];
                if ($adminStatus==true){
                    echo  '<li  class="nav-item"><a class="nav-link" href="index.php">Home</a></li>';
                }
           }
           ?> 
           
           <?php
           if (isset($_SESSION['adminStatus'])){
                $adminStatus = $_SESSION['adminStatus'];
                if ($adminStatus==true){
                    echo  '<li  class="nav-item"><a class="nav-link" href="./project.php">Projects</a></li>';
                }
           }
           if (isset($_SESSION['adminStatus'])){
                $adminStatus = $_SESSION['adminStatus'];
                if ($adminStatus==true){
                    
                    echo  '<li><a class="nav-link" href="./engineer.php">Engineers</a></li>';
                }
                    
           }
           if (isset($_SESSION['adminStatus'])){
                $adminStatus = $_SESSION['adminStatus'];
                if ($adminStatus!==true){
                    
                    echo  '<li><a class="nav-link" href="./engineerView/projects.php">Projects</a></li>';
                }
                    
           }


           ?>
          
           

           <?php 
              if(isset($_SESSION['userId'])){
                echo ' ' ;

            }else {
                echo ' <li class="nav-item"><a class="nav-link" href="signup.php">Signup</a> </li>';
            }
              ?>

           </ul>
            <?php
                if(isset($_SESSION['userId'])){
                    echo ' <form class="form-inline my-2 my-lg-0" action="includes/logout.inc.php" method="post">
                    <button class="signup-btn" type="submit" name="logout-submit">
                        Logout
                    </button>
                </form>' ;

                }else {
                    echo '  <form class="form-inline my-2 my-lg-0" action="includes/login.inc.php" method="post">
                    <input  class="form-control mr-sm-2" type="text" name="email" placeholder="email">
                    <input  class="form-control mr-sm-2" type="password" name="password" placeholder="Password">
                    <button type="submit" name="login-submit">Login</button>
                </form>';
                }

                ?>
           </div>
           <div>
          
              
              
              
           </div>
          
        </nav>
    </header>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="./js/toggleDiv.js" ></script>
    <script src="./js/modal.js" ></script>
</body>
</html>