<?php

class JobMapper {

    private function __construct() {
        
    }
    public static function map(Job $job, array $properties) {
        if (array_key_exists('id', $properties)) {
            $job->setId($properties['id']);
        }
        if (array_key_exists('startDate', $properties)) {
            $job->setStartDate($properties['startDate']);
        }

        if (array_key_exists('endDate', $properties)) {
            $job->setEndDate($properties['endDate']);
        }

        if (array_key_exists('dateCreated', $properties)) {
            $job->setDateCreated($properties['dateCreated']);
        }

        if (array_key_exists('jobTitle', $properties)) {
            $job->setJobTitle($properties['jobTitle']);
        }
        if (array_key_exists('description', $properties)) {
            $job->setDescription($properties['description']);
        }
        if (array_key_exists('hourlyRate', $properties)) {
            $job->setHourlyRate($properties['hourlyRate']);
        }
        if (array_key_exists('clinicId', $properties)) {
            $job->setClinicId($properties['clinicId']);
        }
    }
}
