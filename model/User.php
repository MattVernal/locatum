<?php

class User {
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $contactNumber;
    private $role;
    function getId() {
        return $this->id;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getContactNumber() {
        return $this->contactNumber;
    }

    function getRole() {
        return $this->role;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setContactNumber($contactNumber) {
        $this->contactNumber = $contactNumber;
    }

    function setRole($role) {
        $this->role = $role;
    }


}
