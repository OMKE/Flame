<?php

    /*
        Author: Omar Iriskic - Date: 16 April 2019 - 03:30
        ** Application Core Class **
        desc:
            Creates URL & loads core controller
            URL Format - /controller/method/params
    */

    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];


        public function __construct(){
            

            $url = $this->getUrl();


            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // If exists, set as controller
                $this->currentController = ucwords($url[0]);
                // Unset 0 Index
                unset($url[0]);
            }

            // Require the controler
            require_once '../app/controllers/' . $this->currentController . '.php';

            // Instantiate controller class
            $this->currentController = new $this->currentController;


            // Check for second part of url
            if(isset($url[1])){
                // We are checking if method exists in controller
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    // Unset 1 index
                    unset($url[1]);
                }
            }
            
            // Get params
            $this->params = $url ? array_values($url) : [];

            // Call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

        }

        
        /*
        Author: Omar Iriskic - Date: 16 April 2019 - 03:36
        ** getUrl **
        desc:
            Gets current URL
        return:  assoc_array -  splitted url
        */            
        public function getUrl(){
            if(isset($_GET['url'])){
                // if we trim url just on the right side it creates a empty element at the beginning of the array so we trim it from both sides
                // May cause problems in the future 
                $url = trim($_GET['url'], "/");
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                // Alternative, if rtrim then uncomment this two lines below
                // unset($url[0]);
                // $url = array_values($url);
                return $url;
            } 
        }
        
    }

?>