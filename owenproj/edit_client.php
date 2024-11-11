<?php
    //edit_client.php
   //Start Session
   session_start();
   if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin')
   {
       header("Location: index.php");
       exit();
   }
   //include connection string
   include('database/connection.php');

   //Check if client ID is provided in the URL
   if(isset($_GET['ID'])){
    $client_ID = $_GET['ID'];
    //Fetch the current client data
    $sql = "SELECT * FROM users WHERE ID = '$client_ID'";
    $result = $conn->query($sql);
    //Check if the client is exists
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $gmail = $row['gmail'];
        $address = $row['address'];
        $contact = $row['contact'];
        $course = $row['course'];
        $role = $row['role'];
    }
   }
   else{
         header("Location: admin_dashboard.php");
    }

    //UPDATE FUNCTION
    if(isset($_POST['update'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $gmail = $_POST['gmail'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $course = $_POST['course'];
        //Update the user data in the database using SQL
        $update_sql = "UPDATE users SET username = '$username', firstname = '$firstname', lastname = '$lastname', gmail = '$gmail', address = '$address', contact = '$contact',course = '$course', role = '$role' 
         WHERE ID = '$client_ID'";
         if($conn->query($update_sql) === TRUE){
            header("Location: admin_dashboard.php?updatesuccess");
         }
         else{
            echo "Error Updating Client: ".$conn->error;
         }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
</head>
<body>
    <h2>Edit Client Information</h2>
    <form action="" method="post">
        Username:
        <input type="text" name="username" id="" required value="<?php echo $username; ?>"> <br>
        Firstname:
        <input type="text" name="firstname" id="" required value="<?php echo $firstname; ?>"> <br>
        Lastname:
        <input type="text" name="lastname" id="" required value="<?php echo $lastname; ?>"> <br>
        Gmail:
        <input type="text" name="gmail" id="" required value="<?php echo $gmail; ?>"> <br>
        Adress:
        <input type="text" name="address" id="" required value="<?php echo $address; ?>"> <br>  
        Contact:
        <input type="text" name="contact" id="" required value="<?php echo $contact; ?>"> <br>
        Course:
        <select name="course" id="course">
            <option value="ACT">ACT</option>
            <option value="HMT">HMT</option>
            <option value="BSOA">BSOA</option>
            <option value="CT">CT</option>
            <option value="BSE">BSE</option>
            <option value="HRS">HRS</option>
  </select> <br>
        Role <br>
        <select name="role" id="">
            <option value="client" <?php if($role == 'client') echo 'selected'?>>Client</option>
            <option value="admin" <?php if($role == 'admin') echo 'selected'?>>Admin</option>
        </select>  
        <br>
        <input type="submit" value="Update Record" name="update">
    </form>
</body>
</html>