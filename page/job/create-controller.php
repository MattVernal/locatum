<?php

$headTemplate = new HeadTemplate('Create Job | Locatum', 'Your locum recruitment specialists');
$errors = array();
$job = null;
$edit = array_key_exists('id', $_GET);
if ($edit) {
    $id = $_GET['id'];
    $dao = new JobDao();
    $job = $dao->findById($id);
} else {
    $job = new Job();
    $job->setStartDate('');
    $job->setEndDate('');
    $job->setHourlyRate('');
    $job->setDescription('');
    $job->setJobTitle('');
    $job->setClinicId('');
    
    
}
if (isset($_POST['submit'])) {
    $jobData = array(
        'startDate' => filter_input(INPUT_POST, 'startDate', FILTER_SANITIZE_STRING),
        'endDate' => filter_input(INPUT_POST, 'endDate', FILTER_SANITIZE_STRING),
        'jobTitle' => filter_input(INPUT_POST, 'jobTitle', FILTER_SANITIZE_STRING),
        'description' => filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING),
        'hourlyRate' => filter_input(INPUT_POST, 'hourlyRate', FILTER_VALIDATE_INT),
        'clinicId' => $_SESSION['clinicId']
    );
;
    JobMapper::map($job, $jobData);
    $errors = JobValidator::validate($job);
            
    if (empty($errors)) {
        $dao = new JobDao;
        $job = $dao->save($job);
        header('Location:  ../web/index-controller.php?module=job&page=list');
    }    
}
?>




