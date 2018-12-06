<?php
namespace aitsyd;
class productdetail extends product{
    protected $product_id;
    public $product = array();
    
    public function __construct(){
        parent::__construct();
        $product_id = $_GET['id'];
        
    }
    
    public function getProductById(){
        if(isset($this -> product_id)==false){
            exit();
        }
        else{
            $query = 'SELECT
            product.product_id,
            product.name,
            product.description,
            product.price,
            image.image_file_name
            FROM product
            INNER JOIN product_image
            ON product_image.image_id = image.image_id
            WHERE product.product_id = ?'; //missing element in the query
            $statement = $this -> connection -> prepare($query);
            $statement -> bind_param('i',$this -> product_id); // bind param is here to define what is going into the '?'
            
            if($statement -> execute()){
                $result = $statement -> get_result();
            
                while($row = $result -> fetch_assoc()){
                    array_push($this -> product, $row);
                }
            }
            
            
        }
    }
}
?>