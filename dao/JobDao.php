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
                . 'userId FROM jobs, '
                . 'clinic WHERE jobs.clinicId = clinic.id';
        $result = array();
        foreach ($this->query($sql) as $row) {
            $result[] = $row;
        }
        return $result;
    }

    public function findById($id) {
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

    private function query($sql) {
        $statement = $this->getDb()->query($sql, PDO::FETCH_ASSOC);
        return $statement;
    }

    public function save(Job $job) {
        return $this->insert($job);
    }

    private function insert(Job $job) {
        $job->setId(null);
        $sql = ''
                . 'INSERT INTO jobs (id, startDate, endDate, jobTitle, description, hourlyRate)'
                . 'VALUES (:id, :startDate, :endDate, :jobTitle, :description, :hourlyRate)';
        return $this->execute($sql, $job);
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
            ':description' => $job->getDesription(),
            ':hourlyRate' => $job->getHourlyRate()
        );
        return $params;
    }

}
