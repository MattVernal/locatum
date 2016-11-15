<?php
//Main application class
final class Index {
    //Define directories
    const DEFAULT_PAGE = 'home';
    const DEFAULT_MODULE ='home';
    const PAGE_DIR = '../page/';
    const LAYOUT_DIR = '../layout';
    private $module;
       
//    System config
    public function init(){
        //Error reporting - all errors for development
        error_reporting(E_ALL | E_STRICT);
        //Set Encoding
        mb_internal_encoding('UTF-8');
        //Set Function for exeption handling
        set_exception_handler(array($this, 'handleException'));
        //Load required classes
        spl_autoload_register(array($this, 'loadClass'));
        //Start session
        session_start();        
    }
    //Run application
    public function run() {
        $this->runPage($this->getPage());   
        
    }
    //Exception Handler
    public function handleException(Exception $ex){
        $extra = array('message' => $ex->getMessage());
        if ($ex instanceof NotFoundException){
            header('HTTP/1.0 404 Not Found');
            $this->runErrorPage('404', $extra);
        } else {
            header('HTTP/1.1 500 Internal Sever Error');
            $this->runErrorPage('404', $extra);
        }        
    }
    public function loadClass($name){
        //array of classes to be laoded
        $classes = array();
        //Exception handler if class not found
        if (!array_key_exists($name, $classes)){
            die('Class"' . $name . '"not found.');
        }
        require_once $classes[$name];
    }
    
    
}
















?>





<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Locatum | Your locum recruitment specialists</title>
    </head>
    <body>
        <p>sup</p>
        <?php
        // put your code here
        ?>
    </body>
</html>
