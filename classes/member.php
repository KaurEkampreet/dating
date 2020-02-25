<?php
/**
 * Ekampreet Kaur
 * Date: Februrary 23, 2020
 * Description: getter and setter method for member
 */
class member
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

    /**
     * member constructor.
     * @param $fName
     * @param $lName
     * @param $age
     * @param $gender
     * @param $phone
     */
    function __construct($fName, $lName, $age, $gender, $phone)
    {
        $this->_fName = $fName;
        $this->_lName = $lName;
        $this-> _age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
    }

    /**
     * @return mixed
     */
    function getFirstName()
    {
        return $this->_fName;
    }

    /**
     * @param $fName
     */
    function setFirstName($fName)
    {
        $this->_fName = $fName;
    }

    /**
     * @return mixed
     */
    function getLastName()
    {
       return $this->_lName;
    }

    /**
     * @param $lName
     */
    function setLastName($lName)
    {
        $this->_lName = $lName;
    }

    /**
     * @return mixed
     */
    function getAge()
    {
        return $this->_age;
    }

    /**
     * @param $age
     */
    function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * @return mixed
     */
    function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param $gender
     */
    function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * @return mixed
     */
    function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param $phone
     */
    function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return mixed
     */
    function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param $email
     */
    function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    function getState()
    {
        return $this->_state;
    }

    /**
     * @param $state
     */
    function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return mixed
     */
    function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * @param $seeking
     */
    function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * @return mixed
     */
    function getBio()
    {
        return $this->_bio;
    }

    /**
     * @param $bio
     */
    function setBio($bio)
    {
        $this->_bio = $bio;
    }

}