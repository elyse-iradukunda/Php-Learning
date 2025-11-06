<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
  <style>
    body {
      font-family: sans-serif;
    }

    .form-container {
      width: 300px;
      margin: 50px auto;
      padding: 60px;
      background: rgba(45, 43, 68, 0.8);
      border-radius: 8px;
      color: white

    }

    form {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    label {
      font-size: 14px;
    }

    input, select, button {
      padding: 5px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h3>Class A Information</h3>
    <form action="classwork.php" method="post">
      <label for="phonenumber">Phone Number</label>
      <input type="tel" id="phonenumber" name="phonenumber">

      <label for="firstname">First Name</label>
      <input type="text" id="firstname" name="firstname">

      <label for="lastname">Last Name</label>
      <input type="text" id="lastname" name="lastname">

      <label for="gender">Gender</label>
      <div style="display: flex; gap:10px;">
        Male: <input type="radio" name="Gendar" id=""> 
        Female: <input type="radio" name="Gendar"> 
      </div>
      <button type="submit">Submit</button>
    </form>
  </div>
</body>
   
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
   
  $phoneNumber = $_POST["phonenumber"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $gender = $_POST["gender"];

  echo $phoneNumber;
    
  $conn = mysqli("localhost","root","","classA")
   
  class mysqli{
    $server;
    $user;
    $password;
    $db;
  }
$con = new mysqli("localhost","root","password","classA");
    
}


?>
</html>
