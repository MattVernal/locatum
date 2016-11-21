<?php
class Clinic {
    private $id;
    private $contactName;    
    private $address;
    private $clinicName;
    function getId() {
        return $this->id;
    }

    function getContactName() {
        return $this->contactName;
    }
 
    function getAddress() {
        return $this->address;
    }

    function getClinicName() {
        return $this->clinicName;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setContactName($contactName) {
        $this->contactName = $contactName;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setClinicName($clinicName) {
        $this->clinicName = $clinicName;
    }


}
