<?php

class JobDao extends Dao {

    private $db = null;

    public function __destruct() {
        // close db connection
        $this->db = null;
    }

    public function find($sql) {
        $row = $this->query($sql)->fetch();
        $job = new Job();
        JobMapper::map($job, $row);
        return $job;
    }

    public function findAll() {
        $sql = 'SELECT jobs.id AS Id_job, '
                . 'startDate, '
                . 'endDate, '
                . 'dateCreated, '
                . 'jobTitle, '
                . 'description, '
                . 'hourlyRate, '
                . 'clinicId, '
                . 'clinic.id AS Id_clinic, '
                . 'contactName, '
                . 'address, '
                . 'clinicName, '
                . 'userId '
                . 'FROM jobs INNER JOIN clinic ON jobs.clinicId = clinic.id';
        $result = array();
        foreach ($this->query($sql) as $row) {
            $result[] = $row;
        }
        return $result;
    }
        public function findAllByClinicId($clinicId) {
        $sql = 'SELECT jobs.id AS Id_job, '
                . 'startDate, '
                . 'endDate, '
                . 'dateCreated, '
                . 'jobTitle, '
                . 'description, '
                . 'hourlyRate, '
                . 'clinicId, '
                . 'clinic.id AS Id_clinic, '
                . 'contactName, '
                . 'address, '
                . 'clinicName, '
                . 'userId FROM jobs, '
                . 'clinic WHERE jobs.clinicId = clinic.id AND clinicId ='. $clinicId;
        $result = array();
        foreach ($this->query($sql) as $row) {
            $result[] = $row;
        }
        return $result;
    }

    public function findAllById($id) {
        $sql = 'SELECT jobs.id AS Id_job, '
                . 'startDate, '
                . 'endDate, '
                . 'dateCreated, '
                . 'jobTitle, '
                . 'description, '
                . 'hourlyRate, '
                . 'clinicId, '
                . 'clinic.id AS Id_clinic, '
                . 'contactName, '
                . 'address, '
                . 'clinicName, '
                . 'userId FROM jobs, '
                . 'clinic WHERE jobs.clinicId = clinic.id AND jobs.id = ' . $id;
        $result = $this->query($sql)->fetch();
        return $result;
    }    
    public function findById($id) {
        $sql = 'SELECT * FROM jobs WHERE id ='. $id;
        $result = $this->query($sql)->fetch();
        $job = new Job();
        JobMapper::map($job, $result);
        return $job;
    }
    public function save(Job $job) {
        if ($job->getId() === null){
            return $this->insert($job);
        }
        return $this->update($job);
    }
        private function update(Job $job) {
        $sql = '
            UPDATE jobs SET
                startDate = :startDate,
                endDate = :endDate,
                jobTitle = :jobTitle,
                description = :description,
                hourlyRate = :hourlyRate,
                clinicId = :clinicId
            WHERE
                id = :id';
        
        return $this->execute($sql, $job);
    }

    private function insert(Job $job) {
        $job->setId(null);
        $sql ='INSERT INTO jobs (id, startDate, endDate, jobTitle, description, hourlyRate, clinicId)'
                . 'VALUES (:id, :startDate, :endDate, :jobTitle, :description, :hourlyRate, :clinicId)';
        return $this->execute($sql, $job);
    }
        public function delete($id) {
        $sql = '
            DELETE FROM jobs WHERE id = :id';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            ':id' => $id,
        ));
        return $statement->rowCount() == 1;
    }

    private function execute($sql, Job $job) {
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($job));
        return $job;
    }

    private function getParams(Job $job) {
        $params = array(
            ':id' => $job->getId(),
            ':startDate' => $job->getStartDate(),
            ':endDate' => $job->getEndDate(),
            ':jobTitle' => $job->getJobTitle(),
            ':description' => $job->getDescription(),
            ':hourlyRate' => $job->getHourlyRate(),
            ':clinicId' => $job->getClinicId()                
        );
        return $params;
    }

}
