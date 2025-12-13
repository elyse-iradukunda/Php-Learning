<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
   


<form action="index.php" method="POST">
      
     <pre> 

         <label for="">Name</label>
         <input type="text" name="name">
         <label for="">Phone</label>
         <input type="tel" name="phone">

         <input type="submit" value="submit" name="submit">
     </pre>
</form>

 
<table border='1'>

<?php

   $conn = mysqli_connect("localhost","root","","prep_crud");
    $sel = mysqli_query($conn,"SELECT * FROM customer");

?>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th colspan="2">Operation</th>
    </tr>
  
    <?php while($row = mysqli_fetch_assoc($sel)){?>

        <tr>
            <td><?php echo $row["C_ID"]?></td>
            <td><?php echo $row["Name"]?></td>
            <td><?php echo $row["Phone"]?></td>
            <td> <a href="delete.php?delete=<?php echo $row['C_ID']?>" style="background:red; border:none; color:white;">Delete</a></td>
            <td> <a href="update.php?update=<?php echo $row['C_ID']?>" style="background:blue; border:none; color:white;">Update</a></td>


        </tr>
<?php } ?>

</table>






<?php
if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $conn = mysqli_connect("localhost","root","","prep_crud");
    $ins = mysqli_query($conn,"INSERT INTO customer (Name,Phone) VALUES ('$name','$phone')");

    if($ins){
  echo "recorded";
    }
    else{
        echo "data is not inserted";
    }
}
?>



</body>
</html>