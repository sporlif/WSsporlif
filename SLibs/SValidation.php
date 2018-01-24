<?php

/**
 * Description of SValidation
 *
 * @author MAURICIO PINZÓN
 */

require_once './SConfig/sexpressions_v.php';

class SValidation {
    
    public static function validateEmail($email){
        
        if(preg_match(EMAIL, $email))
            return true;
        else
            return false;
        
    }
    
    public static function validateText($text){
        
        if(preg_match(TEXT, $text))
            return true;
        else
            return false;
    }
    
    public static function validateNumber($number){
        
        if(preg_match(NUMBER, $number))
            return true;
        else
            return false;
        
    }
    
    public static function validateName($name){
        
        if(preg_match(NAME, $name))
            return true;
        else
            return false;
        
    }
    
}

?>