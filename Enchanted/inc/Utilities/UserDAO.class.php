<?php

class UserDAO {

    //Place to store the PDOWrapper
    private static $db;

    // you must initialize the PDOAgent
    static function initialize(string $className)   {                
        self::$db = new PDOWrapper($className);
    }

// +----------+------------------+------+-----+---------+----------------+
// | Field    | Type             | Null | Key | Default | Extra          |
// +----------+------------------+------+-----+---------+----------------+
// | UserID   | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
// | Name     | char(50)         | NO   |     | NULL    |                |
// | Password | char(100)        | NO   |     | NULL    |                |
// | Email    | char(20)         | NO   |     | NULL    |                |
// | Address  | char(100)        | NO   |     | NULL    |                |
// | PhoneNo  | char(100)        | NO   |     | NULL    |                |
// +----------+------------------+------+-----+---------+----------------+
    
    // function to create (insert) user
    static function createUser(User $newUser) : int   {
        // prepared statement
        $sql = "INSERT INTO User (Name, Password, Email, Address, PhoneNo)
                VALUES (:name, :password, :email, :address, :phoneno)";

        // prepare the query
        self::$db->query($sql);

        // bind the parameters
        self::$db->bind(':name',$newUser->getName());
        self::$db->bind(':password',$newUser->getPassword());
        self::$db->bind(':email',$newUser->getEmail());
        self::$db->bind(':address',$newUser->getAddress());
        self::$db->bind(':phoneno',$newUser->getPhoneNo());

        // execute the query
        self::$db->execute();

        return self::$db->lastInsertId();
    }


    static function getUser(string $email){        
        $sql = "SELECT * from User WHERE Email=:email";
        self::$db->query($sql);
        self::$db->bind(':email', $email);
        self::$db->execute();

        return self::$db->singleResult();
    }



    static function editUser(User $uuser){
        $sql = "UPDATE User SET Name=:name,
                Address=:address,
                PhoneNo=:phoneno
                WHERE Email=:email";

        self::$db->query($sql);
        self::$db->bind(':name', $uuser->getName());
        self::$db->bind(':address', $uuser->getAddress());
        self::$db->bind(':phoneno', $uuser->getPhoneNo());
        self::$db->bind(':email', $uuser->getEmail());

        self::$db->execute();

        return self::$db->rowCount();
    }

}

?>