<?php

    /*
    Author: Omar Iriskic - Date: 17 April 2019 - 16:37
    ** PDO DB CLass **
    desc:
        connection to database, prepare statements, bind values, return results
    */
    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $name = DB_NAME;

        // DB Handler
        private $dbh;
        private $stmt;
        private $error;


        public function __construct(){
            // DSN
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->name; 
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            );

            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            } catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }

        }


        /*
        Author: Omar Iriskic - Date: 17 April 2019 - 17:21
        ** query **
        desc:
            Runs query into preparing state
        params:
            sql - SQL Query, 
        */
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }

        /*
        Author: Omar Iriskic - Date: 17 April 2019 - 17:22
        ** bind **
        desc:
            Binds values to queries
        params:
            param - parameter that will be bound, 
            value - value that will be in paramter column, 
        return:  void 
        */
        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }
        
        /*
        Author: Omar Iriskic - Date: 17 April 2019 - 17:24
        ** execute **
        desc:
            Executes statement that was previously prepared
        return: bool - true on success, else on fail
        */
        public function execute(){
            return $this->stmt->execute();
        }

        /*
        Author: Omar Iriskic - Date: 17 April 2019 - 17:26
        ** resultSet **
        desc:
            Invokes execute() then returns rows from table as array of objects
        return: array - array of objects
        */
        public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        /*
        Author: Omar Iriskic - Date: 17 April 2019 - 17:28
        ** single **
        desc:
            Invokes execute() then returns just one row from table
        return: json - object
        */
        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        /*
        Author: Omar Iriskic - Date: 17 April 2019 - 17:30
        ** rowCount **
        desc:
            Returns number of rows
        return: int - row count
        */
        public function rowCount(){
            return $this->stmt->rowCount();
        }



    }