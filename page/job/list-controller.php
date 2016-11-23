<?php

$headTemplate = new HeadTemplate('Browse Jobs | Locatum', 'Your locum recruitment specialists');
$errors = '';

$dao = new JobDao;
$db = $dao->getDb();
$jobs = $dao->findAll($db);
function displayJob($jobs) {
    foreach ($jobs as $row) { 
        echo '<div class="container">';
        echo '<a href="../web/index-controller.php?module=job&page=job&id=' . $row['Id_job'] . '">' ;
        echo  $row['jobTitle'] . '</a>';
        echo '<p>'. $row['clinicName'].'</p>';
        echo '<p>' . $row['hourlyRate']. '</p>';
        echo '<p>'.$row['address'].'</p>';        
        echo  '</div>';
    }
}


