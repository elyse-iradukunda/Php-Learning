<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Current Server Time</h1>
    <p>
        <?php
            echo "The current server time is: " . date("Y-m-d H:i:s");
        ?>
    </p>

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
printf("The value of pi to 3 decimal places:%.3f", $pi);
 echo "<br>";
$color = array('Red','cyan','yellow','gray');

echo "Here is the color from our array: <br>";

print_r($color);

$height = 19;

var_dump($height);
  
?>



<?php
// Valid variables
$name = "Irael";        
$_age = 21;              
$heightInMeters = 1.75;  

// Invalid variables (won't work, uncomment to see errors)
// 1name = "John";        // Starts with number
// $my-age = 25;          // Hyphen not allowed
// $full name = "Irael";  // Space not allowed

// Display type using var_dump
var_dump($name);
var_dump($_age);
var_dump($heightInMeters);
?>

<?php
// Valid variables
$name = "Irael";        
$_age = 21;              
$heightInMeters = 1.75;  

// Invalid variables (won't work, uncomment to see errors)
// 1name = "John";        // Starts with number
// $my-age = 25;          // Hyphen not allowed
// $full name = "Irael";  // Space not allowed

// Display type using var_dump
var_dump($name);
var_dump($_age);
var_dump($heightInMeters);
?>


<?php
// ---------------------------
// 1. Server information
// ---------------------------
echo "Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";
echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "<br>";

// ---------------------------
// 2. Get data from URL (using $_GET)
// Example URL: test.php?name=Irael
// ---------------------------
if (isset($_GET['name'])) {
    echo "Hello, " . $_GET['name'] . "<br>";
}

// ---------------------------
// 3. Post data from a form (using $_POST)
// For demonstration, we just show the array structure
// ---------------------------
echo "Form Data (POST):<br>";
print_r($_POST);
echo "<br>";

// ---------------------------
// 4. Cookies and Sessions
// $_COOKIE -> stores data in browser
// $_SESSION -> stores data on server
// ---------------------------
// Example usage (optional, for beginners you can explore later)
?>



<?php
$a = 10;
$b = 3;

// Arithmetic Operators
echo $a + $b; // 13 → addition
echo "<br>";
echo $a - $b; // 7 → subtraction
echo "<br>";
echo $a * $b; // 30 → multiplication
echo "<br>";
echo $a / $b; // 3.3333 → division
echo "<br>";
echo $a % $b; // 1 → modulus
echo "<br>";

// Assignment Operators
$c = 5;
$c += 3; // equivalent to $c = $c + 3
echo $c . "<br>"; // 8

// Comparison Operators
var_dump($a == $b); // false → equality
var_dump($a != $b); // true → not equal
var_dump($a > $b);  // true → greater than
echo "<br>";

// Increment / Decrement
$a++; // $a = 11
$b--; // $b = 2
echo $a . " " . $b . "<br>"; 

// Logical Operators
var_dump($a > 5 && $b < 5); // true → AND
var_dump($a > 15 || $b < 5); // true → OR
var_dump(!($a == $b)); // true → NOT
?>





</body>
</html>