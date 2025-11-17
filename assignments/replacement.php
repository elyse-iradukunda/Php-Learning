<?php
$myArray = array ("banana","orange","pineaple");

$replacement = array("0"=>"elyse");

$rep = array_replace($myArray,$replacement);

print_r($rep);
?>