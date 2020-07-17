<?php

$servename="localhost";
$dbUsername="root";
$dbPassword="1527";
$dbName="uengine";

$conn =mysqli_connect($servename,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die("Connection failed:" .mysqli_connect_error());
}

