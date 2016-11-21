<?php

class JobDao extends Dao {

    private $db = null;

    public function __destruct() {
        // close db connection
        $this->db = null;
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

    private function executeStatement(PDOStatement $statement, array $params) {
        if (!$statement->execute($params)) {
            self::throwDbError($this->getDb()->errorInfo());
        }
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

    private static function throwDbError(array $params) {
        throw new Exception('DB error[' . $errorInfo[0] . ',' . $errorInfo[1] . ']:' . errorInfo[2]);
    }

}
