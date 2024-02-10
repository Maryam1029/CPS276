<?
class Calculator {
    
    public function calc($string, $numb1 = NULL, $numb2 = NULL) {
        if(is_null($string)||is_null($numb1)||is_null($numb2)){
            return "You must enter a string and two numbers<br>";
        }elseif($string=='*'){
            return "The product of the numbers is " . $numb1*$numb2 .'<br>';
        }elseif($string=='/'){
            if($numb2==0){
                return "Cannot divide by zero<br>";
            }
            return "The division of the numbers is " . $numb1/$numb2.'<br>';
        }elseif($string=='+'){
            return "The sum of the numbers is " . $numb1+$numb2.'<br>';
        }elseif($string=='-'){
            return "The difference of the numbers is " . $numb1-$numb2.'<br>';
        }else{
            return "ERROR";
        }
        
    }
}
?>