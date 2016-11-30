<?php
$headTemplate = new HeadTemplate('Browse Jobs | Locatum', 'Your locum recruitment specialists');
$errors = '';
//Initialise job dao
$dao = new JobDao;
//Initialise DB connection
$db = $dao->getDb();
//Query the DB for an array of all listed jobs
$jobs = $dao->findAll($db);
//Function for displaying all listed jobs
function displayJob($jobs) {
    foreach ($jobs as $row) { 
        echo '<div class="container">';
        echo '<a href="../web/index-controller.php?module=browse&page=job&id=' . $row['Id_job'] . '">' ;
        echo  $row['jobTitle'] . '</a>';
        echo '<p>'. $row['clinicName'].'</p>';
        echo '<p>' . $row['hourlyRate']. '</p>';
        echo '<p>'.$row['address'].'</p>';        
        echo  '</div>';
    }
}


