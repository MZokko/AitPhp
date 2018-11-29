<?php
include('autoloader.php');
$product_class = new Product();
$product = $product_class->getProducts();
?>
<doctype <!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css" />
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css" />/**icon library**/
        <script src="node_modules/jquery/dist/jquery.js"></script>
        <script src="node_modules/boostrap/dist/js/bootstrap.js"></script>
        <script src="node_modules/propper.js/dist/umd/propper.js"></script>
    </head>>
    
    <body>
        <div class="container">
            <div class = "row">
                <?php
                if(count($product) > 0){
                    foreach($product as $product){
                        $id = $product['product_id'];
                        $name = $product['name'];
                        $price = $product['price'];
                        $description = $product['description'];
                        $image = 'images/products/products/' . $product['image_file_name'];
                        echo "<div class=\"col-md-3\">
                                <h3>$name</h3>
                                <img class = \"img-fluid\" src = \"$image\">
                                <p>$price</p>
                                <p>$description</p>
                                <a href = \" detail.php?id=$id\">more detail</a>
                            </div>";
                    }
                }
                ?>
                
            </div>
        </div>
    </body>
</html>