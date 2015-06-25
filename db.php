<?php
    /*
        Database functions
        this file will make our life easier with working with our database

        simple usage:

            $rows = db_select("SELECT `name`,`email` FROM `users` WHERE id=5");
            if($rows === false) {
                $error = db_error();
                // Handle error
            }
    */

    //connection
    function db_connect() {
        // make it static so it will assure a single connection
        static $connection;

        // if not connect already - try to connect
        if(!isset($connection)) {
            // load db configuration from ini file
            $config = parse_ini_file('./config.ini');
            $connection = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
        }

        // handle connection errors
        if($connection == false) {
            echo mysqli_connect_error();
        }

        return $connection;
    }

    //querying
    function db_query($query) {
        $connection = db_connect();
        $res = mysqli_query($connection,$query);
        return $res;
    }

    //retrieve the error
    function db_error() {
        $connection = db_connect();
        return mysqli_error($connection);
    }

    //selecting - returns an array of the results or false
    function db_select($query) {
        $rows = array();
        $result = db_query($query);

        // If query failed, return false
        if($result === false) {
            return false;
        }

        // If query was successful, retrieve all the rows into an array
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    //close connection
    function db_close()
    {
        $conn = db_connect();
        if($conn != false){
            mysqli_close($conn);
        }
    }

?>