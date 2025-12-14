<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
     
     if(isset($_GET["update"])){
        $id=$_GET["update"];
        $conn=mysqli_connect("localhost","root","","Noella_db");
        $sel= mysqli_query($conn,"SELECT * FROM Details where ID='$id'");
      
     }
?>
   
<body>


<?php   while($row=mysqli_fetch_assoc($sel)){ ?>
    <form action="" method="POST">
    
    

    DETAILNAME <br><input type="text" name="detailname"  value=" <?php echo $row['DetailsName'] ?> ">
    <br>
    DATE <br><input type="text" name="date" id="" value=" <?php echo $row['Date'] ?> " ><br><br>
    <input type="submit" value="send" name="send">

   <?php } ?> 
    </form>


    <?php
    if (isset($_POST['send'])) {
        $detailsname=$_POST['detailname'];
        $date=$_POST['date'];
        $up=mysqli_query($conn,"UPDATE  DETAILS SET DetailsName='$detailsname',Date='$date' WHERE ID=$id");
        if ($up) {
           echo "updated";
        }else{
            echo "not updated";
        }
    }
    
    ?>

</body>
</html>