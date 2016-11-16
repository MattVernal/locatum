<?php

//Main application class
final class Index {

    //Define directories
    const DEFAULT_PAGE = 'home';
    const DEFAULT_MODULE = 'home';
    const PAGE_DIR = '../page/';
    const LAYOUT_DIR = '../layout';
    private $module;

//    System config
    public function init() {
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

    //Exception Handler (called in init)
    public function handleException(Exception $ex) {
        $extra = array('message' => $ex->getMessage());
        if ($ex instanceof NotFoundException) {
            header('HTTP/1.0 404 Not Found');
            $this->runErrorPage('404', $extra);
        } else {
            header('HTTP/1.1 500 Internal Sever Error');
            $this->runErrorPage('404', $extra);
        }
    }
    //Class loading function (called in init)
    public function loadClass($name) {
        //array of classes to be laoded
        $classes = array(
            'Config' => '../config/Config.php',
            'Error' => '../validation/Error.php',
            'Flash' => '../flash/Flash.php',
            'NotFoundException' => '../exception/NotFoundException.php',
            'BookingValidator' => '../validation/BookingValidator.php',
            'Utils' => '../util/Utils.php',
            'HeadTemplate' => '../layout/HeadTemplate.php');
        //Exception handler if class not found
        if (!array_key_exists($name, $classes)) {
            die('Class"' . $name . '"not found.');
        }
        require_once $classes[$name];
    }

    private function getPage() {
        //Set page to homepage by default
        $page = self::DEFAULT_PAGE;
        $this->module = self::DEFAULT_MODULE;
        //Check get for page to load, if page exists set page
        if (array_key_exists('page', $_GET)) {
            $page = $_GET['page'];
        }
        //Check get for  module to load, if module exists set module
        if (array_key_exists('module', $_GET)) {
            $this->module = $_GET['module'];
        }
        return $this->checkPage($page);
    }
    
    //Function to check illegal requests in the get
    private function checkPage($page) {
        //Check for illgal characters in the get
        if (!preg_match('/^[a-z0-9-]+$/i', $page)) {
            //log attempt, redirect attacker, ...
            throw new NotFoundException('Unsafe page "' . $page . '" requested');
        }
        //if controller & view dont exist for requested page throw an exception
        if (!$this->hasController($page) && !$this->hasView($page)) {
            //log attempt, redirect attacker, ...
            throw new NotFoundException('Page "' . $page . '" not found');
        }
        return $page;
    }
    // Function for redirecting when an exception is thrown
    private function runErrorPage($page, array $extra = array()){
        $run = true;
        require self::PAGE_DIR . $page . '-controller.php';
        $template = self::PAGE_DIR  . $page . '-view.php';
        $flashes = null;
        require self::LAYOUT_DIR . 'index-view.php';
    }
    //Function to assemble page 
    private function runPage($page, array $extra = array()) {
        $run = false;
        //check if requested page has a controller, require controller if available
        if ($this->hasController($page)) {
            $run = true;
            require $this->getController($page);
        }
        //Check if requested page has a view, if it exist assign it to an object
        if ($this->hasView($page)) {
            $run = true;
            // data for main template
            $view = $this->getView($page);
            $flashes = null;
            if (Flash::hasFlashes()) {
                $flashes = Flash::getFlashes();
            }

            // main template (layout)
            require self::LAYOUT_DIR . '/index-view.php';
        }
        if (!$run) {
            die('Page "' . $page . '" has neither script nor template!');
        }
    }
    //Function to get the controller directory
    private function getController($page) {
        return self::PAGE_DIR . $this->module . '/' . $page . '-ctrl.php';
    }
    //Function to get the view directory
    private function getView($page) {
        return self::PAGE_DIR  . $this->module . '/' . $page . '-view.php';
    }
    //Function to check if the requested page has a controller
    private function hasController($page) {
        return file_exists($this->getController($page));
    }
    //Function to check if the requested page has a view
    private function hasView($page) {
        return file_exists($this->getView($page));
    }

}

$index = new Index();
$index->init();
// run application!
$index->run();

?>
