<?php 

namespace App\Helpers;

class Validate{
    
    public static function validateForm($form, $file){
        //Get form values and validates
        $errors = false;
        foreach($form as $formValues => $value){
            if($formValues == "last_name" ||  $formValues == "submit_user") continue;
            
            if($value == ""){
                $errors = true;
            }
        }

        if(filter_var($form['email'], FILTER_VALIDATE_EMAIL) == false) $errors = true;
        
        if($file['firm']['size'] == 0) $errors = true;
        
        // ? Aprender: cuando se quiera colocar una expresion regular encierrala en `` pero tambien en '', solo en PHP
        if(strlen($form['password']) < 8 || preg_match('`!/[A-Z]/`', $form['password']) || preg_match("`!/\d/`", $form['password'])){
            $errors = true;
        }
        
        return $errors;
    }
}

?>