<?php
//Call connection string 
include('database/connection.php');


if(isset($_POST['register']))
{
    //Get all user inputs
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gmail = $_POST['gmail'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $course = $_POST['course'];

    //Sanitize Username
    $username = $conn->real_escape_string($_POST['username']);
    //Encrypt Password
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = "student";

    //Check if the username is already exists
    $check_sql = "SELECT username FROM users WHERE username='$username'";
    //Execute SQL command
    $result = $conn->query($check_sql);

    if($result->num_rows > 0)
    {
        header("Location: register.php?message=Username Already exist, Please choose another one");
    }
    else 
    {
        $sql_add = "INSERT INTO users (`ID`,`firstname`,`lastname`,`username`,`password`,`gmail`,`address`,`contact`,`course`,`role`) 
        VALUES (NULL, '$firstname','$lastname','$username','$password','$gmail','$address','$contact','$course','$role')";
        //Execute insert command

        if($conn->query($sql_add) === TRUE)
        {
            header("Location: index.php");
        }

    }




}

?>