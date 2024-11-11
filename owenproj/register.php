<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration Page</title>
</head>
<body>
    <h2>REGISTERATION FORM</h2>
    <span style="color: red; font-size: 10px">

    </span>
    <?php
    if(isset($_GET['message']))
    {
        echo $_GET['message'];
    }
    ?>
    <form action="register_add.php" method="post">

        <input type="text" name="firstname" id="" placeholder="Enter Firstname" required>
        <br><br>
        <input type="text" name="lastname" id="" placeholder="Enter Lastname" required>
        <br><br>
        <input type="text" name="username" id="" placeholder="Enter Username" required>
        <br><br>
        <input type="password" name="password" id="" placeholder="Enter Password" required>
        <br><br>
        <input type="email" name="gmail" id="" placeholder="Enter Gmail" required>
        <br><br>
        <input type="text" name="address" id="" placeholder="Enter Address" required>
        <br><br>
        <input type="number" name="contact" id="" placeholder="Enter Contact" required>
        <br><br>
        <label for="course">COURSE:</label>
         <select name="course" id="course">
            <option value="ACT">ACT</option>
            <option value="HMT">HMT</option>
            <option value="BSOA">BSOA</option>
            <option value="CT">CT</option>
            <option value="BSE">BSE</option>
            <option value="HRS">HRS</option>
  </select>
  <br><br>

        <input type="submit" value="Register" name="register" class="reg">
        

    </form>

</body>
</html>