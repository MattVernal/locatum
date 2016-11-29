<?php
class UserCredentialsValidator {
    public static function validateAll($email, $password, $email) {
        $errors = UserCredentialsValidator::validateLogin($email, $password);
        
        if (!$email) {
            $errors[] = 'No Email Entered';
        }
        $email = UserCredentialsValidator::testInput($email);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }
        return $errors;
    }
    public static function validateLogin($email, $password) {
        $errors = array();
        $email = UserCredentialsValidator::testInput($email);
        if (!$email) {
            $errors[] = 'No email entered';
        }
        if (!preg_match("/^[\da-zA-Z@. ]*$/", $email)) {
            $errors[] = 'Only letters, numbers spaces and @ .  allowed in username';
        }
        if (!$password) {
            $errors[] = 'No password entered';
        }
        $password = UserCredentialsValidator::testInput($password);
        if (!preg_match("/^[\da-zA-Z ]*$/", $password)) {
            $errors[] = 'Only letters, numbers and spaces allowed in password';
        }
        return $errors;
    }
    protected static function testInput($string) {
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        return $string;
    }
}