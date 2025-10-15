<?php
// using normal way
$fruits = array("Apple", "Banana", "Orange", "Mango", "Grapes");

echo $fruits[0];
echo $fruits[1];
echo $fruits[2];
echo $fruits[3];
echo $fruits[4];

// using normal loops
for ($i = 0; $i < count($fruits); $i++) {
    echo $fruits[$i];
    echo "\n";
}
 echo"\n";

foreach($fruits as $fruits){
    echo $fruits;
    echo "\n";
}



// Quick notes is that count() works like .lenght we use in js

?>
