<?php

class ClinicMapper {

    private function __construct() {
        
    }

    public static function map(Clinic $clinic, array $properties) {
        if (array_key_exists('id', $properties)) {
            $clinic->setId($properties['id']);
        }
        
        if (array_key_exists('contactName', $properties)) {
            $clinic->setContactName($properties['contactName']);
        }
        if (array_key_exists('address', $properties)) {
            $clinic->setAddress($properties['address']);
        }

        if (array_key_exists('clinicName', $properties)) {
            $clinic->setContactNumber($properties['clinicName']);
        }
    }

}
