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
require_once ("vendor/autoload.php");
require_once ('model/validate.php');
session_start();

//instantiate Fat-free
$f3 = Base::instance();
$controller = new datingcontroller($f3);

$f3->set('DEBUG', 3);
//Define arrays
$f3->set('genders', array(
    'male',
    'female'
));
$f3->set('states', array(
    'washington',
    'oregon',
    'idaho',
    'wyoming'
));
$f3->set('indoor', array(
    'tv',
    'puzzles',
    'movies',
    'reading',
    'cooking',
    'playing cards',
    'board games',
    'video games'
));
$f3->set('outdoor', array(
    'hiking',
    'walking',
    'biking',
    'climbing',
    'swimming',
    'collecting stones'
));
// a default route
$f3->route('GET /', function () {
    $GLOBALS['controller']->home();
});
// route for personalInformation page
$f3->route('GET|POST /personalinformation', function ($f3) {
    $GLOBALS['controller']->personalinformation();
});
// route for profile page
$f3->route('GET|POST /profile', function ($f3) {
    $GLOBALS['controller']->profile();

});
// route for interests page
$f3->route('GET|POST /interests', function ($f3) {
    $GLOBALS['controller']->interests();
});
// route for summary page
$f3->route('GET|POST /summary', function ($f3) {
    $GLOBALS['controller']->summary();
    session_destroy();
    $_SESSION = array();
});
//run fat free
$f3->run();