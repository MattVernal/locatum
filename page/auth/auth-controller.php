<?php

$headTemplate = new HeadTemplate('login | Locatum', 'Your locum recruitment specialists');
$errors = '';
if (isset($_GET['logout'])) {
    // remove all session variables
    session_unset();
    // destroy the session 
    session_destroy();
    header('location: index-controller.php');
}

if (isset($_POST['submit'])) {
    //create new dao for user & clinic
    $userDao = new UserDao();
    $clinicDao = new ClinicDao();
    //initialise db
    $db = $userDao->getDb();
    //set user variables
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];


    //ask the database for user with the supplied credentials
    $user = $userDao->getUserDetails($email, $password, $db);    
    //if supplied credentials match with what was requested from the database, login
    if ($email === $user['email'] && $password === $user['password']) {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $user['role'];
        $_SESSION['userId'] = $user['id'];
        //check if user is also a clinic
        $clinic = $clinicDao->getClinicById($user['id'], $db);
        //if user isnt a clinic continue with login
        if ($clinic === false){
            header('Location: index-controller.php');
        }
        //if user is a clinic store object in the session and continue with logon
        else{
            $_SESSION['clinic'] = $clinic;
            header('Location: index-controller.php');
        }      
        
    } else {
        $errors = 'Incorrect credentials, please try again!';
    }
}


?>


