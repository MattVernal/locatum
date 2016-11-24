<?php

 if (array_key_exists('id', $_GET)){
     $id = $_GET['id'];
     $jobDao = new JobDao();
     $jobDao->delete($id);
    Flash::addFlash('Job deleted successfully.');
    header('location: index-controller.php?module=job&page=list');
 }
 else {
     header('location: index-controller.php?module=job&page=list');
     Flash::addFlash('Job deleted successfully.');
 }

