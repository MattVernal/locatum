<?php
class UserCredentialsValidator {
    public static function validateLogin($email, $password) {
        //define error array
        $errors = array();
        //test email field is valid
        $email = UserCredentialsValidator::testInput($email);
        if (!$email) {
            $errors[] = 'No email entered';
        }
        //check email for illegal characters
        if (!preg_match("/^[\da-zA-Z@. ]*$/", $email)) {
            $errors[] = 'Only letters, numbers spaces and @ .  allowed in username';
        }
        //test password field is valid
        if (!$password) {
            $errors[] = 'No password entered';
        }
        $password = UserCredentialsValidator::testInput($password);
        // Check password for illegal characters
        if (!preg_match("/^[\da-zA-Z ]*$/", $password)) {
            $errors[] = 'Only letters, numbers and spaces allowed in password';
        }
        return $errors;
    }
    //function for testing string input
    protected static function testInput($string) {
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        return $string;
    }
}