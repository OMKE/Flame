<?php
    /*
    Author: Omar Iriskic - Date: 16 April 2019 - 03:29
    ** Requiring libraries **
    desc:
         This bootstrap file is in charge of including all library files
    */
    
    // Load config
    require_once 'config/config.php';

    
    /*
    Author: Omar Iriskic - Date: 16 April 2019 - 07:14
    ** spl_autoload_register **
    desc:
        automatically loads all libraries based of class name
    */
    
    spl_autoload_register(function($className){
        require_once 'libraries/' . $className . '.php';
    });
    
    


?>