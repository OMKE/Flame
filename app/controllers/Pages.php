<?php
    /*
    Author: Omar Iriskic - Date: 17 April 2019 - 18:10
    ** Pages **
    desc:
        Main class for all pages, 
        - Loads all views and models
    */
    class Pages extends Controller {
        public function __construct(){
            // Load models
            // $this->myModel = $this->model('modelName');
        }

        /*
        Author: Omar Iriskic - Date: 17 April 2019 - 18:11
        ** index **
        desc:
            Loads index view from views/
        */
        public function index(){
            // data - it will be available in view file
            $data = [
                'title' => 'Flame',
                'links' => array('1' => array('name' => 'Documentation', 'url' => 'https://github.com/OMKE/Flame'), 
                                '2' => array('name' => 'Examples', 'url' => 'http://flame.omaririskic.com/examples'),
                                '3' => array('name' => 'Github', 'url' => 'https://github.com/OMKE/Flame'))
            ];
            
            $this->view('pages/index', $data);
        }

    }