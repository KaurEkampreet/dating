<?php
/**
 * Ekampreet Kaur
 * Date: January 19, 2020
 * Description: This file define a default route. It route directory to view/home.html
 *
 * When a user navigates to
 * the route of our directory they will be taken to the view that we have defined as views/home.html
 */
//error reporting turned on
ini_set("display_errors",1);
error_reporting(E_ALL);

//require vendor/autoload.php

require ("vendor/autoload.php");

//instantiate Fat-free

$f3 = Base:: instance();

//default route

$f3->route('GET /', function ()
{
    $view = new Template();
    echo $view->render('views/home.html');

    //echo "Pet Home";
});

//run fat free

$f3-> run();
