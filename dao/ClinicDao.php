<?php

class ClinicDao extends Dao {

    private $db = null;

    public function __destruct() {
        // close db connection
        $this->db = null;
    }

    //Function to find user by eamil & password
    public function getClinicById($id, $db) {
        $sql = 'SELECT * FROM clinic WHERE userId =' .$id; 
        $result = $this->query($sql)->fetch();
        return $result;
    }

    public function save(Clinic $clinic) {
        return $this->insert($clinic);
    }

    private function insert(Clinic $clinic) {
        $clinic->setId(null);
        $sql = ''
                . 'INSERT INTO clinic (id, contactName, address, clinicName, userId )'
                . 'VALUES (:id, :contactName, :address, :clinicName, :userId)';
        return $this->execute($sql, $clinic);
    }

    private function execute($sql, Clinic $clinic) {
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($clinic));
        return $clinic;
    }


    private function getParams(Clinic $clinic) {
        $params = array(
            ':id' => $clinic->getId(),
            ':contactName' => $clinic->getContactName(),
            ':address' => $clinic->getAddress(),
            ':clinicName' => $clinic->getClinicName(),
            ':userId' => $clinic->getUserId()
        );
        return $params;
    }

}