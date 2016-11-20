<?php
$headTemplate = new HeadTemplate('Create Account | Locatum', 'Your locum recruitment specialists');
$errors = '';
if (isset($_GET['locum'])){
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
    
}
if (isset($_GET['clinic'])){
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
        'contactName' => $_POST['firstName'],
        'contactMail' => $_POST['email'],
        'address' => $_POST['address'],
        'clinicName' =>$_POST['clinicName'],       
    );
    
    UserMapper::map($user, $data);
   
}