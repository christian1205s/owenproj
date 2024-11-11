<?php
//Declare Variables for connection string
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "owenproj";

//Actual code for connection string
$conn = new mysqli($host, $user, $pass, $dbname);

//if condition to check wether connected or not
if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}




?>