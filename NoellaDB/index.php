<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    DETAILNAME <br><input type="text" name="detailname" required><br><br>
    DATE <br><input type="date" name="date" id=""><br><br>
    <input type="submit" value="send" name="send">
    </form>
    <?php
    if (isset($_POST["send"])) {
        $conn=mysqli_connect("localhost","root","","Noella_db");
        $DetailsName=$_POST["detailname"];
        $date=$_POST["date"];

        $ins=mysqli_query($conn,"INSERT INTO details(DetailsName,Date) VALUES('$DetailsName','$date')");
        if ($ins) {
           echo "well inserted";
        }else{
            echo "not inserted well";
        }
    }
    ?>


<?php
        $conn=mysqli_connect("localhost","root","","Noella_db");
        $sel= mysqli_query($conn,"SELECT * FROM Details");


?>

 <table border='1'>
    <tr>
        <th>ID</th>
        <th>DETAILNAME</th>
        <th>DATE</th>
        <th colspan="2">Operation</th>
</tr>

<?php while($row=mysqli_fetch_assoc($sel)){ ?>

<tr>
   <td><?php echo $row["ID"]?></td>
   <td><?php echo $row["DetailsName"]?></td>
   <td><?php echo $row["Date"]?></td>
    <td><a href="delete.php?delete=<?php echo $row["ID"]?>">delete</a></td>
    <td><a href="update.php?update=<?php echo $row["ID"]?>">update</a></td>
</tr>
<?php }?>
 </table>



</body>
</html>