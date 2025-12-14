<?php 

if (isset($_GET["delete"])) {

   $delete=$_GET["delete"];
   $conn=mysqli_connect("localhost","root","","Noella_db");
 
   $del=mysqli_query($conn,"DELETE FROM details WHERE ID='$delete'");


   if($del){
    header("location:index.php");
   }
   
}
?>