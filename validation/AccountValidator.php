<?php
final class JobValidator {

    private function __construct() {        
    }
    public static function validateUserDetails(User $user) {
        $errors = array();
        
        self::testInput($user->getStartDate());
        self::testInput($user->getEndDate());
        self::testInput($user->getJobTitle());
        self::testInput($user->getDescription());
        self::testInput($user->getHourlyRate());
        
        if (!$user->getStartDate()) {
            $errors[] = new Error('Start Date', 'Empty or invalid Start date.');
        }
        if (!$user->getEndDate()) {
            $errors[] = new Error('End Date', 'Empty or invalid End date.');
        }
        if (!$user->getJobTitle()) {
            $errors[] = new Error('Job Title ', 'Empty or invalid Job Title.');
        }
        if (!$user->getDescription()) {
            $errors[] = new Error('Description ', 'Empty or invalid Description.');
        }
        if (!$user->getHourlyRate()) {
            $errors[] = new Error('Hourly Rate ', 'Empty or invalid Hourly Rate.');
        }
    return $errors;}
        public static function validateClinicDetails(Clinic $clinic) {
        $errors = array();
        
        self::testInput($clinic->getStartDate());
        self::testInput($clinic->getEndDate());
        self::testInput($clinic->getJobTitle());
        self::testInput($clinic->getDescription());
        self::testInput($clinic->getHourlyRate());
        
        if (!$clinic->getStartDate()) {
            $errors[] = new Error('Start Date', 'Empty or invalid Start date.');
        }
        if (!$clinic->getEndDate()) {
            $errors[] = new Error('End Date', 'Empty or invalid End date.');
        }
        if (!$clinic->getJobTitle()) {
            $errors[] = new Error('Job Title ', 'Empty or invalid Job Title.');
        }
        if (!$clinic->getDescription()) {
            $errors[] = new Error('Description ', 'Empty or invalid Description.');
        }
        if (!$clinic->getHourlyRate()) {
            $errors[] = new Error('Hourly Rate ', 'Empty or invalid Hourly Rate.');
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
