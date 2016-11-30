<?php
$headTemplate = new HeadTemplate('Job | Locatum', 'Your locum recruitment specialists');
$errors = '';
// Check the get URL for a job id
if (array_key_exists('id', $_GET)){
    $id= $_GET['id'];// Set id as a variable
    //initialise respective DAOs for job and clinic
    $jobDao = new JobDao;
    $clinicDao = new ClinicDao();
    //Establish DB connection
    $db = $jobDao->getDb();
    //Query the jobs table in the database using the id from the GET
    $job = $jobDao->findById($id);
    //Find the relevent clinic information to the job by querying the clinic DB using its ID
    $clinic = $clinicDao->getClinicById(($job->getClinicId()), $db);
    }