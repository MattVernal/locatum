<?php

class ClinicDao extends Dao {

    private $db = null;

    public function __destruct() {
        // close db connection
        $this->db = null;
    }

    //Function to find user by eamil & password
    public function getClinicById($id, $db) {
        $statement = $db->query('SELECT * FROM clinic WHERE id = "' . $id);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function save(Clinic $clinic) {
        return $this->insert($clinic);
    }

    private function insert(Clinic $clinic) {
        $clinic->setId(null);
        $sql = ''
                . 'INSERT INTO user (id, email, firstName, lastName, contactNumber, password, role)'
                . 'VALUES (:id, :email, :firstName, :lastName, :contactNumber, :password, :role)';
        return $this->execute($sql, $clinic);
    }

    private function execute($sql, Clinic $clinic) {
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($clinic));
        return $clinic;
    }

    private function executeStatement(PDOStatement $statement, array $params) {
        if (!$statement->execute($params)) {
            self::throwDbError($this->getDb()->errorInfo());
        }
    }

    private function getParams(Clinic $clinic) {
        $params = array(
            ':id' => $clinic->getId(),
            ':email' => $clinic->getEmail(),
            ':firstName' => $clinic->getFirstName(),
            ':lastName' => $clinic->getLastName(),
            ':contactNumber' => $clinic->getContactNumber(),
            ':password' => $clinic->getPassword(),
            ':role' => $clinic->getRole()
        );
        return $params;
    }

    private static function throwDbError(array $params) {
        throw new Exception('DB error[' . $errorInfo[0] . ',' . $errorInfo[1] . ']:' . errorInfo[2]);
    }

}
