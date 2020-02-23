<?php

class Member
{
    private  $_fName;
    private  $_lName;
    private  $_age;
    private  $_gender;
    private  $_phone;
    private  $_email;
    private  $_state;
    private  $_seeking;
    private  $_bio;

    function __construct($_fName, $_lName, $_age, $gender, $_phone)
    {
        $this->_fName = $_fName;
        $this->_lName = $_lName;
        $this->_age = $_age;
        $this->_gender = $gender;
        $this->_phone = $_phone;
    }

    function getFirstName()
    {
        return $this->_fName;
    }

    function setFirstName($fName)
    {
        $this->_fName = $fName;
    }

    function getLastName()
    {
       return $this->_lName;
    }

    function setLastName($lName)
    {
        $this->_lName = $lName;
    }

    function getAge($age)
    {
        $this->_age = $age;
    }

    function setAge($age)
    {
        $this->_age = $age;
    }

    function getGender()
    {
        return $this->_gender;
    }

    function setGender($gender)
    {
        $this->_gender = $gender;
    }

    function getPhoneNum()
    {
        return $this->_phone;
    }

    function setPhoneNum($phone)
    {
        $this->_phone = $phone;
    }

    function getEmail()
    {
        return $this->_email;
    }

    function setEmail($email)
    {
        $this->_email = $email;
    }

    function getState()
    {
        return $this->_state;
    }

    function setState($state)
    {
        $this->_state = $state;
    }

    function getSeeking()
    {
        return $this->_seeking;
    }

    function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    function getBio()
    {
        return $this->_bio;
    }

    function setBio($bio)
    {
        $this->_bio = $bio;
    }

}