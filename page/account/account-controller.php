<?php

$headTemplate = new HeadTemplate('Create Account | Locatum', 'Your locum recruitment specialists');
$errors = '';

if (isset($_POST['submit'])) {
    if ($_POST['accountType'] === 'locum') {
        $user = new User();
        $user->setEmail('');
        $user->setFirstName('');
        $user->setLastName('');
        $user->setPassword('');
        $user->setContactNumber('');
        $user->setRole('locum');
        $userData = array(
            'email' => $_POST['email'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'password' => $_POST['password'],
            'phoneNumber' => $_POST['phoneNumber'],
        );
        UserMapper::map($user, $userData);
        if (empty($errors)) {
            $dao = new UserDao;
            $user = $dao->save($user);
            $_SESSION['email'] = $user->getEmail();
            header('location: index-controller.php');
        }
    }
    if ($_POST['accountType'] === 'clinic') {
        echo 'clinic';
        $user = new User();
        $clinic = new Clinic();
        $user->setEmail('');
        $user->setFirstName('');
        $user->setLastName('');
        $user->setPassword('');
        $user->setContactNumber('');
        $user->setRole('clinic');

        $userData = array(
            'email' => $_POST['email'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'password' => $_POST['password'],
            'phoneNumber' => $_POST['phoneNumber'],
        );
        $clinicData = array(
            'contactName' => ($_POST['firstName'] . ' ' . $_POST['lastName']),
            'contactMail' => $_POST['email'],
            'address' => $_POST['address'],
            'clinicName' => $_POST['clinicName'],
        );
        var_dump($clinicData);
        var_dump($userData);
        die();
        
        UserMapper::map($user, $userData);
        ClinicMapper::map($clinic, $clinicData);
        header('location: index-controller.php');
    }
}