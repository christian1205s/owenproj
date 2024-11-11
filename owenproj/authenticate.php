<?php
    //include the database connection file
    include('database/connection.php');

    //Start session to manage user data

    session_start();
    
    //Check the form is submitted using login button
   
    if(isset($_POST['login']))
    {
        //Sanitized username to prevent SQL injection
        $username = $conn->real_escape_string($_POST['username']);
        $password = $_POST['password'];
        
        //SQL query to select user data from database based on username

        $sql_user = "SELECT * FROM users WHERE username='$username'";
    
        //Execute Sql Command
        $result = $conn->query($sql_user);
        
        //Check if the query returned any results
        if($result->num_rows > 0)
        {
            //Fetch the associated user data
            $row = $result->fetch_assoc();

            //Verify the password provided against stored hashed password in db
            if(password_verify($password, $row['password']))
            {
                //if password is correct set session variables
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $row['role'];
                
                //Redirect User to the appropriate dashboard
                if($row['role'] == 'admin')
                {
                    header("Location: admin_dashboard.php");
                }
                else if($row['role'] == 'student')
                {
                    header("Location: student_dashboard.php");
                }
            }
            else
            {
               header("Location: index.php?incorrect");
            }

        }
        else 
        {
            //Incorrect Username
            header("Location: index.php?incorrect");
        }

    }

?>