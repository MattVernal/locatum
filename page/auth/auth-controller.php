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
    //set user variables & filter user input
    $email = filter_input(INPUT_POST, 'inputEmail', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'inputPassword', FILTER_SANITIZE_STRING);
    $errors = UserCredentialsValidator::validateLogin($email, $password);
    //ask the database for user with the supplied credentials
    $user = $userDao->getUserDetails($email, $password, $db);
    //if supplied credentials match with what was requested from the database, login    
    if ($user) {
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['role'] = $user->getRole();
        $_SESSION['userId'] = $user->getId();
        //check if user is also a clinic
        $clinic = $clinicDao->getClinicById($user->getId(), $db);
        //if user isnt a clinic continue with login
        if ($clinic === null){
            header('Location: index-controller.php');
        }
        //if user is a clinic store clinicId in the session and continue with logon
        else{
            $_SESSION['clinicId'] = $clinic->getId();
            header('Location: index-controller.php');
        }      
    //If there are errors in the page prevent login and display error messages
    } else {
        $errors = 'Incorrect credentials, please try again!';
    }
}


?>


