<?php
   
$a = 3;

if($a > 0){
    goto add;
}
else{
    goto sub;
}

add:
  echo $a+1;
  exit;
  
sub:
  
  echo $a-1;
  
  exit;
?>