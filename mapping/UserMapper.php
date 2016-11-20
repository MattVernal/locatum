<?php

class UserMapper {

    private function __construct() {
        
    }
    public static function map(User $user, array $properties) {
        if (array_key_exists('id', $properties)) {
            $user->setId($properties['id']);
        }
        if (array_key_exists('email', $properties)) {
            $user->setEmail($properties['email']);
        }
        
        if (array_key_exists('firstName', $properties)) {
            $user->setFirstName($properties['firstName']);
        }
        if (array_key_exists('lastName', $properties)) {
            $user->setLastName($properties['lastName']);
        }
        
        if (array_key_exists('phoneNumber', $properties)) {
            $user->setContactNumber($properties['phoneNumber']);
            }
            
        if (array_key_exists('password', $properties)) {
            $user->setPassword($properties['password']);
        }
        if (array_key_exists('role', $properties)) {
            $user->setRole($properties['role']);
        }
    }
}
