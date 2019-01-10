<?php
namespace aitsyd;
class Account extends Database{
    public function __construct(){
        parent ::__construct();
    }
    public function signUp($username,$email,$password){
        $errors = array();
        $validuser = Validator::username($username);
        if($validuser['success']==false){
            $errors['username']=$validuser['errors'];
        }
        //email validate
        $validemail = filter_var($email,FILTER_VALIDATE_EMAIL);
        if($validemail==false){
            $errors['email'] = array('invalid email');
        }
        
        //validate password
        $validpassword = Validator::password($password);
        if($validpassword['success'] == false){
            $errors['password'] = $validpassword['errors'];
        }
        
    //array for the result of error checking
    $result = array();
     //check if there are errors
     if( count($errors)>0){
         //sign up not successfull
         $result['success'] = false;
         $result['errors'] = $errors;
         print_r($result);
         return $result;
     }
     else {
         //no error insert the user to the database
         $query = 'INSERT INTO account (email,password,username,created,updated,active)
         VALUES(?,?,?,NOW(),NOW(),1)';
         //hash the password
         $hash = password_hash($password , PASSWORD_DEFAULT);
         $statement = $this->connection->prepare($query);
         $statement->bind_param('sss',$email,$hash,$username);
         if($statement->execute()){
             //execute successfully
             $account_id = $this->connection->insert_id;
             $_SESSION['account_id']= $account_id;
             $_SESSION['username']= $username;
             $_SESSION['email']=$email;
             $result['sucess']=true;
             
         }
         elseif($this->connection->errno = '1062'){
             //username or email already exist
             //check if error relates
             
             if(strpos($this->connection->error,'username')>0){
                 //username already exist
                 $result['success'] = false;
                 $result['errors']['username'] = 'username already exist';
             }
             elseif(strpos($this->connection->error,'email')>0){
                 //email already exist
                 $result['success'] = false;
                 $result['errors']['email'] = 'email already exist';
             }
             print_r($result);
             return $result;
         }
     }
         
     }
     //check the username and password with the database
    public function singIn($user,$password){
     //check if user is an email 
     if(filter_var($user,FILTER_VALIDATE_EMAIL)){
         //user is using email adress
         $query = 'SELECT account_id,email,username,password
         FROM account
         WHERE email=?
         AND active=1';
     }
     else{
         //user is using username
         $query = 'SELECT account_id,email,username,password
         FROM account
         WHERE username=?
         AND active=1';
     }
     $statement=$this->connection->prepare($query);
     $statement->bind_param('s',$user);
     $statement->execute();
     $result = $statement->get_result();
     
     $response = array();
     if($result->num_rows == 0 ){
         //the account doesnt exist
         $response['success']= false;
         $response['error']='account doesnt exist';
     }
     else{
         $row = $result->fetch_assoc();
         $account_id = $row['account_id'];
         $email= $row['email'];
         $username = $row['username'];
         $hash = $row['password'];
         
         //check user password match the hash
         if(password_verify($password , $hash)){
             //password matches hashes
             $response['success']=true;
             
         }
         else{
             //password does not match
             $response['success']=false;
             $response['error']='invalid password';
         }
     }
     return $response;
    }
    
    
    }

?>