<?php
$headTemplate = new HeadTemplate('Create Job | Locatum', 'Your locum recruitment specialists');
$errors = '';
$job = new Job();
$job->setStartDate('');
$job->setEndDate('');
$job->setHourlyRate('');
$job->setDesription('');
$job->setJobTitle('');

if (isset($_POST['submit'])) {
    $jobData = array(
        'startDate' => $_POST['startDate'],
        'endDate' => $_POST['endDate'],
        'jobTitle' => $_POST['jobTitle'],
        'description' => $_POST['description'],
        'hourlyRate' => $_POST['hourlyRate'],
        'clinicId' => $_SESSION['clinic']['id']
    );   
    JobMapper::map($job, $jobData);
    if(empty($errors)){
            $dao = new JobDao;
            $job = $dao->save($job);     
            
        }
}   
?>




