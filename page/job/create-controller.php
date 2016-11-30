<?php
$errors = array();
$job = null;
//Check get for an id, if there is an id, it will be edit job, if there isnt it will be create a new job
$edit = array_key_exists('id', $_GET);
if ($edit) {
    $headTemplate = new HeadTemplate('Edit Job | Locatum', 'Your locum recruitment specialists');
    //if an id exists assign it to a variable
    $id = $_GET['id'];
    //initialise dao
    $dao = new JobDao();
    //query the DB using the above id to find the job
    $job = $dao->findById($id);
} else {
    $headTemplate = new HeadTemplate('Create Job | Locatum', 'Your locum recruitment specialists');
    // if there is no id, initialise an empty job object
    $job = new Job();
    $job->setStartDate('');
    $job->setEndDate('');
    $job->setHourlyRate('');
    $job->setDescription('');
    $job->setJobTitle('');
    $job->setClinicId('');
    
    
}
//Once submit is clicked
if (isset($_POST['submit'])) {
    // Assign, sanitise and filter user input and assign the values to their respective keys in the array
    $jobData = array(
        'startDate' => filter_input(INPUT_POST, 'startDate', FILTER_SANITIZE_STRING),
        'endDate' => filter_input(INPUT_POST, 'endDate', FILTER_SANITIZE_STRING),
        'jobTitle' => filter_input(INPUT_POST, 'jobTitle', FILTER_SANITIZE_STRING),
        'description' => filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING),
        'hourlyRate' => filter_input(INPUT_POST, 'hourlyRate', FILTER_VALIDATE_INT),
        'clinicId' => $_SESSION['clinicId']
    );
    //Map the array to an instance of a job object
    JobMapper::map($job, $jobData);
    //Validate user input using the JobValidator class
    $errors = JobValidator::validate($job);
    //If there arent any errors save the job to the database
    if (empty($errors)) {
        $dao = new JobDao;
        $job = $dao->save($job);
        header('Location:  ../web/index-controller.php?module=job&page=list');
    }    
}
?>




