<?php
class Database{
    protected $connection;
    protected function __construct(){
        try{
            $conn = mysqli_connect(
                getEnv ('host'),
                getEnv('dbuser'),
                getEnv('dbpassword'),
                getEnv('dbname')
                );
                if($conn){
                    $this -> connection = $conn;
                }else{
                    throw new Exception('database connection error');
                }
        }
        catch( Exception $exc){
            echo $exc;
        }
    }
    
}
?>