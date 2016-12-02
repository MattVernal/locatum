<?php

class ClinicDao extends Dao {

    private $db = null;

    public function __destruct() {
        // close db connection
        $this->db = null;
    }

    //Function to find clinic by user ID
    public function getClinicByUserId($id, $db) {
        //Initialise SQL
        $sql = 'SELECT * FROM clinic WHERE userId =' . $id;
        //Query the DB using the above SQL
        $result = $this->query($sql)->fetch();
        //if clinic not found return null
        if ($result === FALSE) {
            return null;
        }       
        //If the clinic is found, map the returned array to an instance of a clinic object
        else {
            $clinic = new Clinic;
            ClinicMapper::map($clinic, $result);
            return $clinic;
        }      
    }
        //Function to find clinic by ID
    public function getClinicById($id, $db) {
        //Initialise SQL
        $sql = 'SELECT * FROM clinic WHERE Id =' . $id;
        //Query the DB using the above SQL
        $result = $this->query($sql)->fetch();
        //if clinic not found return null
        if ($result === FALSE) {
            return null;
        }       
        //If the clinic is found, map the returned array to an instance of a clinic object
        else {
            $clinic = new Clinic;
            ClinicMapper::map($clinic, $result);
            return $clinic;
        }      
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
