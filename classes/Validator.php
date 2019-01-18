<?php
namespace aitsyd;
class Validator {
    public static function username($username){
        $errors = array();
        //check for spaces
        $userLetters = str_split($username);
        foreach($userLetters as $letter){
            if($letter == ' '){
                array_push($errors,'cannot containt spaces');
                break;
            }
        }
        //check for the length
        if(strlen($username)<6){
            array_push($errors,'minimum 6 characters');
        }
        if(ctype_alnum($username)==false){
            array_push($errors,'only alpha numeric character');
        }
        //check for html tag
        if(strlen(strip_tags($username))!= strlen($username)){
            array_push($errors, 'cannont contain htnml');
        }
        
        $result = array();
        if(count($errors)>0){
            $result['success']==false;
            $result['errors']==$errors;
            
        }
        else{
            $result['success']=true;
        }
        return $result;
    }
    public static function password($password){
            $errors = array();
            if(strlen($password)<6){
                array_push($errors , 'minimum 6 characters');
            }
            // if(ctype_alnum($password)){
            //     array_push($errors , 'need to contain a symbol');
            // }
            
            //return the result of the password validation
            $result = array();
            if( count($errors) > 0 ){
              $result['success'] = false;
              $result['errors'] = $errors;
            }
            else{
              $result['success'] = true;
            }
            return $result;
    }
}
?>