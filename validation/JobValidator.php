<?php

final class JobValidator {

    private function __construct() {        
    }
    public static function validate(Job $job) {
        $errors = array();
        
        self::testInput($job->getStartDate());
        self::testInput($job->getEndDate());
        self::testInput($job->getJobTitle());
        self::testInput($job->getDescription());
        self::testInput($job->getHourlyRate());
        
        if (!$job->getStartDate()) {
            $errors[] = new Error('Start Date', 'Empty or invalid Start date.');
        }
        if (!$job->getEndDate()) {
            $errors[] = new Error('End Date', 'Empty or invalid End date.');
        }
        if (!$job->getJobTitle()) {
            $errors[] = new Error('Job Title ', 'Empty or invalid Job Title.');
        }
        if (!$job->getDescription()) {
            $errors[] = new Error('Description ', 'Empty or invalid Description.');
        }
        if (!$job->getHourlyRate()) {
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
