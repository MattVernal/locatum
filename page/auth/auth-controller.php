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
    //create new dao for user
    $dao = new UserDao();
    //initialise db
    $db = $dao->getDb();
    //set user variables
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];


    //ask the database for user with the supplied credentials
    $user = $dao->getUserDetails($email, $password, $db);
    //if supplied credentials match with what was requested from the database, login
    if ($email === $user['email'] && $password === $user['password']) {
        $_SESSION['email'] = $email;
        header('Location: index-controller.php');
    } else {
        $errors = 'Incorrect credentials, please try again!';
    }
}


?>


