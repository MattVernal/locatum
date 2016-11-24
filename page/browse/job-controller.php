<?php
$headTemplate = new HeadTemplate('Job | Locatum', 'Your locum recruitment specialists');
$errors = '';

if (array_key_exists('id', $_GET)){
    $id= $_GET['id'];
    $dao = new JobDao;
    $db = $dao->getDb();
    $job = $dao->findById($id);
    }