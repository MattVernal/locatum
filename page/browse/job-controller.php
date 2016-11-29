<?php
$headTemplate = new HeadTemplate('Job | Locatum', 'Your locum recruitment specialists');
$errors = '';

if (array_key_exists('id', $_GET)){
    $id= $_GET['id'];
    $jobDao = new JobDao;
    $clinicDao = new ClinicDao();
    $db = $jobDao->getDb();
    $job = $jobDao->findById($id);
    $clinic = $clinicDao->getClinicById(($job->getClinicId()), $db);
//    var_dump($clinic);
//    die();
    }