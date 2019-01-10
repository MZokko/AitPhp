<?php

include('vendor/autoload.php');

use aitsyd\Account;
$page_title = 'Sign Up';

//add logic
//initialize the session
session_start();
//handle the post request of signup twig

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //handle variable of the form signup.twig
    $username = $_POST['username'];//name of the field in the form of signup
    $email = $_POST['email'];
    $password = $_POST['password'];
    //create instance of account class
    $account = new Account();
    $signup = $account-> signUp($username,$email,$password);
    print_r($signup);
    
}

include ('includes/navigation.inc.php');

$loader = new Twig_Loader_Filesystem('templates');

$twig = new Twig_Environment($loader, array(
    //'cache' => 'cache',
    ));
    
$template = $twig ->load('signup.twig');

echo $template -> render(array(
    'pages'=>$pages,
    'pagetitle'=>$page_title,
    'currentPage'=>$currentPage,
    ));

?>