<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
</head>
<body>
    <form action="login.php" method="POST">
    <pre>
    <label for="">Username</label>
    <input type="text" name="username" placeholder="Username">
    <label for="">Password</label>
    <input type="password" name="password" placeholder="Password">
    <button type="submit" name="login">Login</button>
    </pre>
</form>

</body>
</html>

<?php

if(isset($_POST["login"])){

    session_start();
    
    $username=$_POST["username"];
    $password=$_POST["password"];

    $conn=mysqli_connect("localhost","root","","prep_crud");
    $sel=mysqli_query($conn,"SELECT * FROM USER WHERE UserName='$username' AND Password ='$password'");

    if(mysqli_num_rows($sel) ==1){

        $_SESSION["user"]=$username;
        header("location:index.php");
    }
    else{
        echo "<script> alert('Wrong username Or password')</script>";
    }

}


?>