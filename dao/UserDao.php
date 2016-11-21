<?php

class UserDao extends Dao {

    private $db = null;

    public function __destruct() {
        // close db connection
        $this->db = null;
    }
    //Function to find user by eamil & password
    public function getUserDetails($email, $password, $db) {
        $statement = $db->query('SELECT email, password, role FROM user WHERE email = "' . $email . '" AND password = "' . $password . '"');
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function save(User $user){        
            return $this->insert($user);
        }   
    
    private function insert(User $user){
        $user->setId(null);
        $sql = ''
                . 'INSERT INTO user (id, email, firstName, lastName, contactNumber, password, role)'
                . 'VALUES (:id, :email, :firstName, :lastName, :contactNumber, :password, :role)';
        return $this->execute($sql, $user);        
    }
    private function execute ($sql, User $user){
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($user));
        return $user;
    }
    private function executeStatement(PDOStatement $statement, array $params){
        if(!$statement->execute($params)){
            self::throwDbError($this->getDb()->errorInfo());
        }
    }
    private function getParams(User $user){
        $params = array(
            ':id' => $user->getId(),
            ':email' => $user->getEmail(),
            ':firstName' => $user->getFirstName(),
            ':lastName' => $user->getLastName(),
            ':contactNumber' => $user->getContactNumber(),
            ':password' => $user->getPassword(),
            ':role' => $user->getRole()
        
        );
        return $params;
    }
    private static function throwDbError(array $params){
        throw new Exception('DB error[' . $errorInfo[0] . ',' . $errorInfo[1] . ']:' . errorInfo[2]);
    }
    
    
}
