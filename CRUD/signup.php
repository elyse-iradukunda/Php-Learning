<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
</head>
<body>
    
<form action="signup.php" method="post">
   <pre>
     <label for="">Username:</label>
      <input type="text" name="username">

      <label for="">Password:</label>
      <input type="text" name="password">

      <label for="">Confirm password</label>
      <input type="text" name="confrim">

      <input type="submit" value="Sign In" name="signin">
   </pre>
</form>
</body>
</html>
<?php

 if(isset($_POST["signin"])){
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["confrim"];
    $conn = mysqli_connect("localhost","root","","prep_crud");

    $sel=mysqli_query($conn,"SELECT * FROM User where username='$username'");

    if($password!=$cpassword){
              echo "<script>  alert('Password not  match');</script>";
    }

    if(mysqli_num_rows($sel)==1){
      echo "<script>  alert('user Exist');</script>";
    }
    else{

        $ins=mysqli_query($conn,"INSERT INTO USER (UserName,Password) values('$username','$password')");

        if($ins){
            echo "<script> alert('User was  was inserted sucesseful');</script>";
        }
    }
 }
?>