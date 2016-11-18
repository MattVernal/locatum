<?php

class UserMapper {

    private function __construct() {
        
    }
    public static function map(Booking $user, array $properties) {
        if (array_key_exists('id', $properties)) {
            $user->setId($properties['id']);
        }
        if (array_key_exists('email', $properties)) {
            $user->setEmail($properties['emailx']);
        }
        
        if (array_key_exists('firstName', $properties)) {
            $user->setFirstName($properties['firstName']);
        }
        
        if (array_key_exists('contactNumber', $properties)) {
            $user->setContactNumber($properties['contactNumber']);
            }
            
        if (array_key_exists('password', $properties)) {
            $user->setPassword($properties['password']);
        }
        if (array_key_exists('role', $properties)) {
            $user->setRole($properties['role']);
        }
    }

    private static function createDateTime($input) {
        return DateTime::createFromFormat('Y-n-j H:i:s', $input);
    }

}
