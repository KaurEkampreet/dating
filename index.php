<?php
/**
 * Ekampreet Kaur
 * Date: January 19, 2020
 * Description: This file define a default route. It route directory to view/home.html
 *
 * When a user navigates to
 * the route of our directory they will be taken to the view that we have defined as views/home.html
 */

session_start();
//error reporting turned on
ini_set("display_errors",1);
error_reporting(E_ALL);

//require vendor/autoload.php

require ("vendor/autoload.php");
require ('model/validate.php');
//instantiate Fat-free
$f3 = Base:: instance();

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
//Define a default route
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});
//default route for personalInformation page
$f3->route('GET|POST /personalinformation', function ($f3) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        //Add data to hive
        $f3->set('firstName', $firstName);
        $f3->set('lastName', $lastName);
        $f3->set('age', $age);
        $f3->set('gender', $gender);
        $f3->set('phone', $phone);
        //If data is valid store them in session variable
        if (validForm()) {
            //Write data to Session
            $_SESSION['firstName'] = $firstName; //firstName is a session variable, storing user valid input in session variable
            $_SESSION['lastName'] = $lastName;
            $_SESSION['age'] = $age;
            $_SESSION['phone'] = $phone;
            $_SESSION['gender'] = $gender;
            //Redirect to profile
            $f3->reroute('/profile');
        }
    }
    $view = new Template();
    echo $view->render('views/personalinformation.html');
});
//default route for profile page
$f3->route('GET|POST /profile', function ($f3) {
    //get the values from the form if the server request is POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Get data from profile form
        $email = $_POST['email'];
        $state = $_POST['state'];
        $seeking = $_POST['seekingGender'];
        $inputText = $_POST['inputText'];
        //Add data to hive profile
        $f3->set('email', $email);
        $f3->set('state', $state);
        $f3->set('seeking', $seeking);
        $f3->set('inputText', $inputText);
        //  valid data store them in session variable
        if (profileInformationValidation()) {
            //Write data to Session
            $_SESSION['email'] = $email;
            $_SESSION['state'] = $state;
            $_SESSION['seeking'] = $seeking;
            $_SESSION['inputText'] = $inputText;
            //Redirect to profile
            $f3->reroute('/interests');
        }
    }
    $view = new Template();
    echo $view->render('views/profile.html');
});
//default route for Interests page
$f3->route('GET|POST /interests', function ($f3) {
    $selectedIndoors = array();
    $selectedOutdoors = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Get data from indoor
        //            var_dump($_POST);
        if (!empty($_POST['indoor'])) {
            //            $selectedIndoors = $_POST['indoor'];
            foreach ($_POST['indoor'] as $value) {
                array_push($selectedIndoors, $value);
            }

        }
        //Get the data form outdoor
        if (!empty($_POST['outdoor'])) {
            foreach ($_POST['outdoor'] as $value) {
                array_push($selectedOutdoors, $value);
            }

        }
        //Add data to hive
        $f3->set('indoorInterests', $selectedIndoors);
        $f3->set('outdoorInterests', $selectedOutdoors);
        //If data is valid
        if (interests()) {
            //Write data to Session
            $_SESSION['indoor'] = $selectedIndoors;
            $_SESSION['outdoor'] = $selectedOutdoors;
            //Redirect to Summary
            $f3->reroute('/summary');
        }
    } //end
    $view = new Template();
    echo $view->render('views/interests.html');
});
//default route for summary page
$f3->route('GET|POST /summary', function ($f3) {
    $view = new Template();
    echo $view->render('views/summary.html');
});
//run fat free
$f3->run();