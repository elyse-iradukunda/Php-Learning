<?php
$conn = mysqli_connect("localhost","root","","classA");



if(isset($_POST['send'])) {
  $phoneNumber = $_POST["phonenumber"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $gender = $_POST["Gendar"];
  $province = $_POST["province"];
 $INSERT=mysqli_query($conn,"INSERT INTO information VALUES('$phoneNumber','$firstname','$lastname', '$gender','$province')");
 
if($INSERT){
    echo '<script>alert("here we go");
    window.location.href="classwork.php";
    </script>';
    
}


}






?>