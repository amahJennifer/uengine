<?php
include "env.php";

$servename=$_ENV['DB_HOST'];
$dbUsername=$_ENV['DB_USERNAME'];
$dbPassword=$_ENV['DB_PASSWORD'];
$dbName=$_ENV['DB_NAME'];
 
$conn =mysqli_connect($servename,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die("Connection failed:" .mysqli_connect_error());
}

