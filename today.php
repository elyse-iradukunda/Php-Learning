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

<?php

// $fruits = array("apple","banana","Orange");
$colors = ["orange","green","Blue",'white','black','purple','yellow'];

$num =[2,4,6];

array_push($num,8,10); // adding the element at the end.
array_unshift($num,2,0); // adding element ad the beginning.
array_shift($num); // removing element at the beginning.
array_pop($num); // remove element at the end
unset($num[2]); // removing element in the middle anyhere you want.
print_r($num);

?>
?>