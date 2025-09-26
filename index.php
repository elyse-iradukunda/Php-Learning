<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
//    echo phpinfo();
    ?>

<p>Demostratin comments in php</p>

<?php
          //single line comment.

//  $names ='Elyse Iradukunda'
       //multi line comment
/*
   $names ='Elyse Iradukunda'
   $names ='Elyse Iradukunda'
*/

/**
 * c. Documentation comment
 * Used for describing functions, classes, variables.
 * Helpful for IDEs and auto-documentation tools.
 */
?>

<?php
 $number = 100;
 $names = 'Irael';

 echo $number;  
       echo "<br>";
 echo $names;

  echo "<br>";


?>


<?php
    $names = 'Elyse Iradukunda';
    print "May name is:  ".$names;
    
?>


<?php

$pi =pi();

printf("The value of pi to 3 decimal places:", $pi);
 echo "<br>";
$color = array('Red','cyan','yellow','gray');

echo "Here is the color from our array: <br>";

print_r($color);

$height = 19.5;

var_dump($height);
  
?>
</body>
</html>