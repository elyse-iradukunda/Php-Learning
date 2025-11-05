<?php

// $fruits = array("apple","banana","Orange");
$fruits = ["apple","banana","Orange"];
$cars = ["toyota","benze","BMW"];

$merged =array_merge($fruits,$cars);
$

 print_r($merged);
 
 echo $merged;

 foreach( $fruits as $i  ){
     echo $i." hello";
     echo "\n";
 }

?>

<?php

// quick notes about array in php


$cars = ["toyota" => "90","benze" => "59","BMW"=>"60"];

foreach($cars as $i => $v){
  
 echo $i.":". $v; 
 echo "\n";
}


?>