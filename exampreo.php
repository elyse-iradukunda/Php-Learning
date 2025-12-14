function recursive($num){
    if($num < 1){
       return "invalid in put";
    }else if($num==0|| $num==1){
         return 1;
    }else{
         return $num * recursive($num - 1);
    }
}

 echo "factorial is".recursive(10);