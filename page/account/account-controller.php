<?php

$headTemplate = new HeadTemplate('Create Account | Locatum', 'Your locum recruitment specialists');
$errors = '';

if (array_key_exists('option', $_GET)) {
    if ($_GET['option'] === 'locum') {     
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
        if(empty($errors)){
            $dao = new UserDao;
            $user = $dao->save($user);
            $_SESSION['email'] = $user->getEmail();
            
        }
        

    }
    if ($_GET['option'] === 'clinic') {
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
            'contactName' => ($_POST['firstName'] . $_POST['lastName']),
            'contactMail' => $_POST['email'],
            'address' => $_POST['address'],
            'clinicName' => $_POST['clinicName'],
        );

        UserMapper::map($user, $userData);
        ClinicMapper::map($clinic, $clinicData);
    }
}