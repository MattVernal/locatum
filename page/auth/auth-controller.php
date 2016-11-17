<?php
$headTemplate = new HeadTemplate('login | Locatum', 'Your locum recruitment specialists');
$errors = '';
if(isset($_GET['logout'])){
    // remove all session variables
    session_unset();
    // destroy the session 
    session_destroy();
    header('location: index.php');    
}
if(isset($_POST['submit'])) {   
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];    
    $user = getUserDetails($email, $password);
    
    if($email === $user['email'] && $password === $user['password']){
        $_SESSION['user_email'] = $email;
        $_SESSION['role']= $user['role'];
        header('Location: index.php');
    }else{
        $errors = 'These credentials are not recognised.';
    }   
}
?>


