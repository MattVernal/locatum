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
        //Start session
        session_start();
        //Load
        spl_autoload_register(array($this, 'loadClass'));
        
        
        
        
        
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
