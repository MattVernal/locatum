<?php

$headTemplate = new HeadTemplate('My Jobs | Locatum', 'Your locum recruitment specialists');
$errors = '';
$clinicId = $_SESSION['clinic']['id'];
$dao = new JobDao;
$db = $dao->getDb();
$jobs = $dao->findAllByClinicId($clinicId);



