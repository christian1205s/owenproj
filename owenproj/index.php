<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clark College Science And Technology</title>
</head>
<body>
    <div class="mnav">
            <h1>Clark College Science And Technology</h1>
    <div class="home">

        <a href="#section1" class="home">Home</a>
        <a href="#section2" class="home"> About Us</a>
        <a href="#section3" class="home"> Register Now!</a>
        
    </div>
</div>

<div class="mhome" id="section1">
<p>haahahahha</p>


</div>

<div class="about" id="section2">

<p>hawehaehaew</p>
</div>







    <div class="container" id="section3">
    <h2>Register Now!</h2>
    <span>
        <?php
        if(isset($_GET['incorrect']))
        {
            echo "Incorrect Username or Password!";
        }
        
        ?>
    </span>
    <form action="authenticate.php" method="post">
        <input type="text" name="username" id="" placeholder="Enter Username" required>
        <br> <br>
        <input type="password" name="password" id="" placeholder="Enter Password" required>
        <br><br>
        <input type="submit" value="LOGIN" name="login">
    </form>
    <form action="register.php" method="post">
        <input type="submit" value="REGISTER">
    </form>


    </div>

</body>
</html>