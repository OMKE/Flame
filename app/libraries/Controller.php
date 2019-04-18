<?php
    /*
    Author: Omar Iriskic - Date: 16 April 2019 - 06:39
    ** Base controller **
    desc:
        Loads the models and views
    */

    class Controller {
        /*
        Author: Omar Iriskic - Date: 17 April 2019 - 18:14
        ** model **
        desc:
            Loads model from models/
        params:
            model - model name, 
        return: Model - reutrns an instance of Model class
        */
        public function model($model){
            require_once "../app/models/" . $model . ".php";

            // Instantiate model
            return new $model();
        }

        /*
        Author: Omar Iriskic - Date: 17 April 2019 - 18:16
        ** view **
        desc:
            Loads a view from views/
        params:
            view - View name, 
            data - data that will be passed to the view, 
        */
        public function view($view, $data = []){
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            } else {
                die("View does not exists");
            }
        }


    }
    