<?php
include('vendor/autoload.php');
//include('autoloader.php');
//generate product
use aitsyd\Product;

$product_class = new Product();
$products = $product_class->getProducts();
$page_title = 'shop Page';

//generate categories
use aitsyd\Categories;
$category_class = new Categories();
$categories = $category_class->getCategories();
$active_category = $category_class->getActive();


$loader = new Twig_Loader_Filesystem('templates');

$twig = new Twig_Environment($loader, array(
    //'cache' => 'cache',
    ));

$template = $twig ->load('home.twig');
echo $template -> render(array(
    'pages'=>$pages,
    'products'=>$products,
    'pageTitle'=>$page_title,
    'currentPage'=>$currentPage,
    'categories'=> $categories,
    'activeCategory' => $active_category
    ));

?>
