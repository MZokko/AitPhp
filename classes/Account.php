<?php
namespace aitsyd;
class Account extends Database{
  public function __construct(){
    parent::__construct();
  }
  public function signUp($username,$email,$password){
    $errors = array();
    //validate username
    $validuser = Validator::username( $username );
    if( $validuser['success'] == false ){
      $errors['username'] = $validuser['errors'];
    }
    //validate email
    $validemail = filter_var($email,FILTER_VALIDATE_EMAIL);
    if( $validemail == false ){
      $errors['email'] = array('invalid email');
    }
    //validate password
    $validpassword = Validator::password($password);
    if( $validpassword['success'] == false ){
      $errors['password'] = $validpassword['errors'];
    }
    //array for result
    $result = array();
    //check if there are errors
    if( count($errors) > 0 ){
      //signup not successful
      $result['success'] = false;
      $result['errors'] = $errors;
      return $result;
    }
    else{
      //no errors
      //add user to our database
      $query = 'INSERT INTO account (email,password,username,created,updated,active)
      VALUES(?,?,?,NOW(), NOW(), 1)';
      //hash the password
      $hash = password_hash($password,PASSWORD_DEFAULT);
      $statement = $this -> connection -> prepare( $query );
      $statement -> bind_param('sss',$email,$hash,$username);
      if( $statement -> execute() ){
        //executed successfully
        $account_id = $this -> connection -> insert_id;
        $_SESSION['account_id'] = $account_id;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $result['success'] = true;
      }
      elseif( $this -> connection -> errno == '1062'){
        //username or email already exists
        //check if error relates to username
        if( strpos( $this -> connection -> error, 'username') > 0 ){
          //username already exists
          $result['success'] = false;
          $result['errors']['username'] = 'username already exists';
        }
        elseif( strpos( $this -> connection -> error, 'email') > 0 ){
          //email already exists
          $result['success'] = false;
          $result['errors']['email'] = 'email already exists';
        }
        return $result;
      }
    }
  }
  
  public function signIn($user,$password){
    //check if $user is an email
    if( filter_var($user,FILTER_VALIDATE_EMAIL) ){
      //user is using email address
      $query = 'SELECT account_id,email,username,password 
      FROM account 
      WHERE email=? AND active=1';
    }
    else{
      //user is using username
      $query = 'SELECT account_id,email,username,password 
      FROM account
      WHERE username=? AND active=1';
    }
    $statement = $this -> connection -> prepare($query);
    $statement -> bind_param('s', $user );
    $statement -> execute();
    $result = $statement -> get_result();
    //array for response
    $response = array();
    
    if( $result -> num_rows == 0 ){
      //account does not exist
      $response['success'] = false;
      $response['error'] = 'account does not exist';
    }
    else{
      $row = $result -> fetch_assoc();
      $account_id = $row['account_id'];
      $email = $row['email'];
      $username = $row['username'];
      $hash = $row['password'];
      //check user's password against the hash
      if( password_verify($password,$hash) ){
        //password matches hash
        $response['success'] = true;
      }
      else{
        //password does not match
        $response['success'] = false;
        $response['error'] = 'wrong password';
      }
    }
    return $response;
  }
}
?>