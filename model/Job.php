<?php

class Job {
   private $id;
   private $startDate;
   private $endDate;
   private $dateCreated;
   private $jobTitle;
   private $description;
   private $hourlyRate;
   private $clinicId;
   
   function getClinicId() {
       return $this->clinicId;
   }

   function setClinicId($clinicId) {
       $this->clinicId = $clinicId;
   }
   
   function getId() {
       return $this->id;
   }

   function getStartDate() {
       return $this->startDate;
   }

   function getEndDate() {
       return $this->endDate;
   }

   function getDateCreated() {
       return $this->dateCreated;
   }

   function getJobTitle() {
       return $this->jobTitle;
   }

   function getDescription() {
       return $this->desription;
   }

   function getHourlyRate() {
       return $this->hourlyRate;
   }

   function setId($id) {
       $this->id = $id;
   }

   function setStartDate($startDate) {
       $this->startDate = $startDate;
   }

   function setEndDate($endDate) {
       $this->endDate = $endDate;
   }

   function setDateCreated($dateCreated) {
       $this->dateCreated = $dateCreated;
   }

   function setJobTitle($jobTitle) {
       $this->jobTitle = $jobTitle;
   }

   function setDescription($desription) {
       $this->desription = $desription;
   }

   function setHourlyRate($hourlyRate) {
       $this->hourlyRate = $hourlyRate;
   }


}
