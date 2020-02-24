<?php
class premiumMember extends member
{
    private $_inDoorInterests;
    private $_outDoorInterests;


    function __construct($fName, $lName, $age, $gender, $phone, $inDoorInterests = "?", $outDoorInterests = "?")
    {
        parent::__construct($fName, $lName, $age, $gender, $phone);
        $this->_inDoorInterests = $inDoorInterests;
        $this->_outDoorInterests = $outDoorInterests;

    }
    function getIndoor()
    {
        return $this->_inDoorInterests;
    }

    function setIndoor($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    function getOutdoor()
    {
        return $this->_outDoorInterests;
    }

    function setOutdoor($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }
}