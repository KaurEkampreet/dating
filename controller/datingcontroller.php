<?php

class datingcontroller
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function personalinformation()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];

            //data to hive personalinformation
            $this->_f3->set('firstName', $firstName);
            $this->_f3->set('lastName', $lastName);
            $this->_f3->set('age', $age);
            $this->_f3->set('gender', $gender);
            $this->_f3->set('phone', $phone);
            $this->_f3->set('checkBox', checkbox);

            $checkBox = isset($_POST['checkbox']);
            $_SESSION['checkbox'] = $checkBox;

            if (isset($_POST['checkbox'])) {
                $member = new premiumMember($firstName, $lastName, $age, $gender, $phone);
            } else {
                $member = new member($firstName, $lastName, $age, $gender, $phone);
            }
            if (validForm()) {
                $_SESSION['member'] = $member;
                //Redirect to profile
                $this->_f3->reroute('/profile');

            }
        }
        $view = new Template();
        echo $view->render('views/personalinformation.html');
    }

    function profile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Get data from profile form
            $email = $_POST['email'];
            $state = $_POST['state'];
            $seeking = $_POST['seekingGender'];
            $inputText = $_POST['inputText'];

            // hive profile
            $this->_f3->set('email', $email);
            $this->_f3->set('state', $state);
            $this->_f3->set('seeking', $seeking);
            $this->_f3->set('inputText', $inputText);

            if (profileInformationValidation()) {
                $_SESSION['member']->setEmail($email);
                $_SESSION['member']->setState($state);
                $_SESSION['member']->setSeeking($seeking);
                $_SESSION['member']->setBio($inputText);

                if ($_SESSION['checkbox'] == 1) {
                    //redirect
                    $this->_f3->reroute('/interests');
                } else {
                    $this->_f3->reroute('/summary');
                }
            }
        }

        $view = new Template();
        echo $view->render('views/profile.html');

    }

    function interests()
    {
        $selectedIndoors = array();
        $selectedOutdoors = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Get data from indoor
            if (!empty($_POST['indoor'])) {
                foreach ($_POST['indoor'] as $value) {
                    array_push($selectedIndoors, $value);
                }
            }
            if (!empty($_POST['outdoor'])) {
                foreach ($_POST['outdoor'] as $value) {
                    array_push($selectedOutdoors, $value);
                }
            }
            $this->_f3->set('indoorInterests', $selectedIndoors);
            $this->_f3->set('outdoorInterests', $selectedOutdoors);

            if (interests()) {
                //Write data to Session
                $_SESSION['indoor'] = $selectedIndoors;
                $_SESSION['outdoor'] = $selectedOutdoors;
                $_SESSION['member']->setIndoor($_SESSION['indoor']);
                $_SESSION['member']->setOutdoor($_SESSION['outdoor']);
                //Redirect to Summary
                $this->_f3->reroute('/summary');
            }
        }
        $view = new Template();
        echo $view->render('views/interests.html');
    }
    function summary()
    {
        $view = new Template();
        echo $view->render('views/summary.html');
    }
}
