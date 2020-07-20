<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
        <a>
            <p>Logo Brand</p>
        </a>
           <ul>
           <li><a href="index.php">Home</a></li>
           <?php
           if (isset($_SESSION['adminStatus'])){
                $adminStatus = $_SESSION['adminStatus'];
                if ($adminStatus==true){
                    echo  '<li><a href="projects.php">Projects</a></li>';
                }
           }
           ?>
          
           <li><a href="#">Work</a></li>
           </ul>
           <div>
           <?php
                if(isset($_SESSION['userId'])){
                    echo ' <form action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit">
                        Logout
                    </button>
                </form>' ;

                }else {
                    echo '  <form action="includes/login.inc.php" method="post">
                    <input type="text" name="email" placeholder="email">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" name="login-submit">Login</button>
                </form>';
                }

                ?>
              <?php 
              if(isset($_SESSION['userId'])){
                echo ' ' ;

            }else {
                echo ' <a href="signup.php">Signup</a> ';
            }
              ?>
              
              
           </div>
          
        </nav>
    </header>
</body>
</html>