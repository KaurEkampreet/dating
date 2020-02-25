<?php
/**
 * Ekampreet Kaur
 * Date: Februrary 23, 2020
 * Description: getter and setter method for premiummember
 */
class premiumMember extends member
{
    /**
     * @var string
     */
    private $_inDoorInterests;
    /**
     * @var string
     */
    private $_outDoorInterests;


    /**
     * premiumMember constructor.
     * @param $fName
     * @param $lName
     * @param $age
     * @param $gender
     * @param $phone
     * @param string $inDoorInterests
     * @param string $outDoorInterests
     */
    function __construct($fName, $lName, $age, $gender, $phone, $inDoorInterests = "?", $outDoorInterests = "?")
    {
        parent::__construct($fName, $lName, $age, $gender, $phone);
        $this->_inDoorInterests = $inDoorInterests;
        $this->_outDoorInterests = $outDoorInterests;

    }

    /**
     * @return string
     */
    function getIndoor()
    {
        return $this->_inDoorInterests;
    }

    /**
     * @param $inDoorInterests
     */
    function setIndoor($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return string
     */
    function getOutdoor()
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param $outDoorInterests
     */
    function setOutdoor($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }
}