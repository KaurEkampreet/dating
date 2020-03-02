<?php

require_once("config.php");

class Database
    {
        private $_dbh;

        function __construct()
        {
            try {
                // Create connection
                $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
                //    echo "Connected!";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        function insertMember($member)
    {
    $sql = "INSERT INTO member(member_id,fname,lname,age,gender,phone,email,state,seeking,bio,premium)
            VALUES(DEFAULT,:fname,:lname,:age,:gender,:phone,:email,:state,:seeking,:bio,:premium)";

    $statement=$this->_dbh->prepare($sql);

    $statement->bindParam(':fname',$member->getFirstName());
    $statement->bindParam(':lname',$member->getLastName());
    $statement->bindParam(':age',$member->getAge());
    $statement->bindParam(':gender',$member->getGender());
    $statement->bindParam(':phone',$member->getPhone());
    $statement->bindParam(':email',$member->getEmail());
    $statement->bindParam(':state',$member->getState());
    $statement->bindParam(':seeking',$member->getSeeking());
    $statement->bindParam(':bio',$member->getBio());

    $ipremium=
        (is_a(($member) == "PremiumMember")) ? 1:0;
    $statement->bindParam(':premium',$ipremium);

    $statement->execute();

    }

    function getMembers()
    {
    $sql = "SELECT * FROM member";
    $statement = $this->_dbh->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;

    }

    function getMember($id)
    {
    $sql = "SELECT * FROM member
    WHERE member_id = :id";
    $statement = $this->_dbh->prepare($sql);
    $statement->bindParam(':id',$id);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return$result;
    }

    function getInterests($id)
    {
    $sql="SELECT interest_id FROM interest
                RIGHT JOIN member_interest ON interest.interest_id = member_interest.interest_id
                WHERE member_id = :id";
    $statement=$this->dbh->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    return$result;
    }
}
