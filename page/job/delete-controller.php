<?php

 if (array_key_exists('id', $_GET)){
     //Check get for an ID, assign to a variable
     $id = $_GET['id'];
     //Initialise Dao
     $jobDao = new JobDao();
     //Execute delete method in the job dao using the id
     $jobDao->delete($id);
    Flash::addFlash('Job deleted successfully.');
    header('location: index-controller.php?module=job&page=list');
 }
 else {
     header('location: index-controller.php?module=job&page=list');
     Flash::addFlash('Job deleted successfully.');
 }

