<?php
$headTemplate = new HeadTemplate('My Jobs | Locatum', 'Your locum recruitment specialists');
$errors = '';
if (isset($_SESSION['email'])) {
//Access clinic ID stored in the sesion and assign to a variable
    $clinicId = $_SESSION['clinicId'];
//Initialise Dao
    $dao = new JobDao;
//Initailise connection to the DB
    $db = $dao->getDb();
//Use the daos method for finding all of the jobs by the users clinic ID
    $jobs = $dao->findAllByClinicId($clinicId);
}
