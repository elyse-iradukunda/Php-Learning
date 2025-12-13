

<?php
 function ceo($string){
 $trim = trim($string);
 $replace = str_replace(" ","_",$trim);
 $ucword = ucwords($replace);
  $upper = strtoupper($ucword);
  return $ucword;
}

echo(ceo("Auto-formatting title in a CMS or blog system")); 
echo "<br>";
?>


<?php
function hashProduct($p){

    return md5($p);

}
echo hashProduct(1234);
echo "<br>";
?>


<?php
c

echo(Charcode());

?>


<?php

function Convert($c,$f){
    
    $findCeliciusToFa = ($c* 9/5)+32;
    $findFaToCelicus =($f-32)* 5/9;

    return "The Fahrenheit".$findCeliciusToFa ."and ".$findFaToCelicus;
}

echo(Convert(13,50));
?>

<?php 
 
//  function length($str){
//     if(strlen($str)==5) && (ctype_alnum($str)==true){
        
//         return "this is valid format";
//     }
//     else{
//         return "watokombey";
//     }
//  }
// echo (length("fb355"));
?>
















