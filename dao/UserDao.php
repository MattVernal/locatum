<?php

class UserDao extends Dao {

    private $db = null;

    public function __destruct() {
        // close db connection
        $this->db = null;
    }
    //Function to find user by eamil & password
    public function getUserDetails($email, $password, $db) {
        $statement = $db->query('SELECT email, password FROM user WHERE email = "' . $email . '" AND password = "' . $password . '"');
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}
