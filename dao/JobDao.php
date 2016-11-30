<?php

class JobDao extends Dao {

    private $db = null;

    public function __destruct() {
        // close db connection
        $this->db = null;
    }

//    public function find($sql) {
//        $row = $this->query($sql)->fetch();
//        $job = new Job();
//        JobMapper::map($job, $row);
//        return $job;
//    }
    //Function to return an array of all listed jobs in the DB with their respective clinic info 
    public function findAll() {
        //initialise SQL
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
        //foreach loop for querying DB and returning each row in an array
        foreach ($this->query($sql) as $row) {
            $result[] = $row;
        }
        return $result;
    }
        public function findAllByClinicId($clinicId) {
            //initialise SQL
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
    //Function to query the DB to find a job by its ID
    public function findById($id) {
        //initialise SQL with id from the GET
        $sql = 'SELECT * FROM jobs WHERE id ='. $id;
        //Query the DB using the above SQL, the job will be returned as an asociative array
        $result = $this->query($sql)->fetch();
        //Create a new instance of a job object
        $job = new Job();
        //Map the array returned from the DB to the object defined above & return the mapped job
        JobMapper::map($job, $result);
        return $job;
    }
    public function save(Job $job) {
        //Check for edit condition (in this case if there is an id assigned to the job) If there isnt an id, insert the new job into the DB
        if ($job->getId() === null){
            return $this->insert($job);
        }//If there is an id assigned to the job being parsed in update the corresponding entry in the DB
        return $this->update($job);
    }
        private function update(Job $job) {
            //Initialise SQL
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
        //Execute the query on the DB by parsing the above SQL and the job object into the execute function below 
        return $this->execute($sql, $job);
    }

    private function insert(Job $job) {
        //set job id as null, db will auto assign a value
        $job->setId(null);
        //Initialise SQL
        $sql ='INSERT INTO jobs (id, startDate, endDate, jobTitle, description, hourlyRate, clinicId)'
                . 'VALUES (:id, :startDate, :endDate, :jobTitle, :description, :hourlyRate, :clinicId)';
         //Execute the query on the DB by parsing the above SQL and the job object into the execute function below
        return $this->execute($sql, $job);
    }
        public function delete($id) {
        //Initialise SQL
        $sql = '
            DELETE FROM jobs WHERE id = :id';
        //Execute Query 
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
        //Asign parameters to job properties
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
