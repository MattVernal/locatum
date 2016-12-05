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
            'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING),
            'firstName' => filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING),
            'lastName' => filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING),
            'password' => filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING),
            'phoneNumber' => filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_STRING)
        );
        UserMapper::map($user, $userData);
        $errors = AccountValidator::validate($user, $clinic);
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
//        $clinic->
        $user->setEmail('');
        $user->setFirstName('');
        $user->setLastName('');
        $user->setPassword('');
        $user->setContactNumber('');
        $user->setRole('clinic');

        $userData = array(
            'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING),
            'firstName' => filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING),
            'lastName' => filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING),
            'password' => filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING),
            'phoneNumber' => filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_STRING)
        );
        UserMapper::map($user, $userData);
        if (empty($errors)) {
            $userDao = new UserDao;
            $user = $userDao->save($user);
        }
        $id = $userDao->getUserId($_POST['email']);
        $clinicData = array(
            'contactName' => ($_POST['firstName'] . ' ' . $_POST['lastName']),
            'contactMail' => $user->getEmail(),
            'address' => $_POST['address'],
            'clinicName' => $_POST['clinicName'],
            'userId' => $userDao->getUserId($_POST['email'])
        );

        ClinicMapper::map($clinic, $clinicData);
        if (empty($errors)) {
            $clinicDao = new ClinicDao;
            $clinic = $clinicDao->save($clinic);            
            header('location: index-controller.php?module=auth&page=auth');
        }
    }
}