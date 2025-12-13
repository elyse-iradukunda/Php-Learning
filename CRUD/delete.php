 <?php 
 
 if(isset($_GET["delete"])){

    $delete = $_GET["delete"];
    $conn = mysqli_connect("localhost","root","","prep_crud");
    

    $del = mysqli_query($conn,"DELETE FROM customer where C_ID=$delete");
 

 if($del){
    echo" deleted succusses";
 }

 else{
    echo "not deleted";
 }
 }
 
 ?>