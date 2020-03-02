<?php
//create table member(member_id int(200) NOT NULL AUTO_INCREMENT, fname VARCHAR(200) not null, lname varchar(200) not null, age int(50) not null, gender varchar(200), phone varchar(50) not null, email varchar(200) not null, state varchar(50), seeking varchar(50), bio VARCHAR (200), premium TINYINT(1), image varchar(250), PRIMARY KEY (member_id));

//CREATE TABLE interest(interest_id int(200) not null AUTO_INCREMENT, interest varchar(200) not null, type varchar(200) not null, PRIMARY KEY(interest_id));

//CREATE TABLE member_interest(member_id int(200) not null, interest_id int(200) not null, FOREIGN KEY(member_id) REFERENCES member(member_id), FOREIGN KEY(interest_id) REFERENCES interest(interest_id));


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
