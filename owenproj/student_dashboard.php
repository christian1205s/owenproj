<?php

    session_start();

    if(!isset($_SESSION['username'])  || $_SESSION['role'] != 'student')
    {
        header("Location: index.php");
    }
    //Include database connection
    include('database/connection.php');
    //Declare variable for search query
    $search_query = '';
    //Check if search query is submitted
    if(isset($_GET['search']))
    {
        $search_query = $conn->real_escape_string($_GET['search']);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Page</title>
</head>
<body>
    <h2>STUDENT'S ENROLLED</h2> <?php echo $_SESSION['username'];  ?>
    <a href="logout.php"> Logout</a>
    <br> <br>
    <form action="" method="get">
        <input type="text" name="search" id="" placeholder="Search">
        <input type="submit" value="Search"> <br> <br>
    </form>

    <table border="1" style="width: 80%;">
        <tr>
            <td>#</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Course</td>
        </tr>
    <?php
        if(!empty($search_query)){
            $sql = "SELECT * FROM users WHERE (course LIKE '%$search_query%' OR firstname LIKE '%$search_query%' OR lastname LIKE '%$search_query%') AND role = 'student'";
    }
    else{
        $sql = "SELECT * FROM users WHERE role = 'student'";
    }
    $result = $conn->query($sql);
    //Check if any client exist
    if($result->num_rows > 0){
        //Loop to display each client
        $count=1;
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$count."</td>";
            echo "<td>".$row['firstname']."</td>";
            echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['course']."</td>";
           
           

            $count++;
        }

    }
    else {
        echo "<tr><td colspan='6'>No Students Found! </td></tr>";
    }
    ?>
</body>
</html>