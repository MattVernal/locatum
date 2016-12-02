<?php
$headTemplate = new HeadTemplate('Home | Locatum', 'Your locum recruitment specialists');
//Initialise job dao
$dao = new JobDao;
//Initialise DB connection
$db = $dao->getDb();
//Query the DB for an array of all listed jobs
$jobs = $dao->findAll($db);
//Function for displaying all listed jobs
function displayJob($jobs) {
    foreach ($jobs as $row) {   
       
        echo '<li><p>' .'<a href="../web/index-controller.php?module=browse&page=job&id=' . $row['Id_job'] . '">' . $row['jobTitle'] . '-' . $row['clinicName']. '</a> '.'Location: '. $row['address'] .', $'.  $row['hourlyRate'] . ' Per Hour </p>';
    }
}