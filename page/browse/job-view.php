<?php
echo '<div class = "container">';
echo '<h1>Title: '.$job->getJobTitle(). '</h1>';
echo '<h3>Location: '.$clinic->getAddress().'</h3>';
echo '<h3>Rate: '.$job->getHourlyRate().'</h3>';
echo '<p>description :'.$job->getDescription().'</p>';
echo '<h3>Reference Number: '.$job->getId().'</h3>';
echo '<h3>Contact Details: '.$clinic->getContactName().'</h3>';
echo '<h3>Listed: '.$job->getDateCreated().'</h3>';
echo '</div>'
?>
        
