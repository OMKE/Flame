<?php
    /*
    Author: Omar Iriskic - Date: 16 April 2019 - 06:39
    ** Base controller **
    desc:
        Loads the models and views
    */

    class Controller {
        // Load model
        public function model($model){
            require_once "../app/models/" . $model . ".php";

            // Instantiate model
            return new $model();
        }

        public function view($view, $data = []){
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            } else {
                die("View does not exists");
            }
        }


    }
    