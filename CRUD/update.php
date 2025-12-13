<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update php</title>
</head>
<body>
    


 <a href="index.php?delete=<?php echo $row["c_id"]?>">delete</a>

 <?php 
  

    $i=$_GET["update"];
   $conn= mysqli_connect("localhost","root","","prep_crud");
    $sel = mysqli_query($conn,"SELECT * FROM customer where C_ID='$i'");

    if($sel){
        echo "selection is done ";
    }

    else{
        echo "failed to select";
    }

 ?>
   <?php while($row = mysqli_fetch_assoc($sel)) { ?>

 <form method="post">
        <pre> 
        <input type="hidden" name="id" value="<?php echo $row["C_ID"] ?>">
         <label for="">Name</label>
         <input type="text" name="name" value="<?php echo $row["Name"] ?> " >
         <label for="">Phone</label>
         <input type="tel" name="phone" value="<?php echo $row["Phone"] ?>">

         <input type="submit" value="submit" name="update">

     </pre>

 </form>
    <?php } ?>  
 
 <?php

 if(isset($_POST["update"])){
   $id =$_POST["id"]; 
   $name = $_POST["name"];
   $phone = $_POST["phone"];

   $conn = mysqli_connect("localhost","root","","prep_crud");
   $update = mysqli_query($conn,"UPDATE customer  SET  Name ='$name',Phone ='$phone' WHERE  C_ID ='$id'");
  if($update){
    echo "data was updated";

    header("location:index.php");
  }
  else{
    echo "failed to update";
  }

   }
 ?>

</body>
</html>


