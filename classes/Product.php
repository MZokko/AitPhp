<?php
namespace aitsyd;

class Product extends Database {
    public $product = array();
    public function __construct(){
        parent::__construct();// product inherit the connection to the db
    }
    public function getProducts(){
        $query = "SELECT
        @pid := product_id AS product_id,
        name,
        description,
        price,
        @image_id := (SELECT image_id FROM product_image WHERE product_id = @pid LIMIT 1) AS image_id,
        (SELECT image_file_name FROM image WHERE image_id = @image_id) AS image_file_name
        FROM product
        WHERE active=1";
        $statement = $this -> connection -> prepare ($query);
        $statement -> execute();
        $result = $statement -> get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                array_push($this-> product,$row);
            }
        }
         return $this->product;
        
    }
}
?>