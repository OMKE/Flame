<?php
    /*
    
    require:
         Configuration for database, globals for application name, etc.
    */
    
    require_once 'config/config.php';

    
    /*
    Author: Omar Iriskic - Date: 16 April 2019 - 07:14
    ** spl_autoload_register **
    desc:
        Automatically loads all libraries based of a class name
    */
    spl_autoload_register(function($className){
        require_once 'libraries/' . $className . '.php';
    });
    
    


?>