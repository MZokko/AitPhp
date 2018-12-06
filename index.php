<?php
include('vendor/autoload.php');
//include('autoloader.php');
use aitsyd\Product;

$product_class = new Product();
$products = $product_class->getProducts();

$loader = new Twig_Loader_Filesystem('templates');

$twig = new Twig_Environment($loader, array(
    'cache' => 'cache',));

$template = $twig ->load('home.twig');
echo $template -> render(array('products' => $products));

?>
