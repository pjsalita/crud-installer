<?php
    namespace App;

    session_start();

    // Catch errors to Exception
    set_error_handler(
        function ($severity, $message, $file, $line) {
            throw new \ErrorException($message, $severity, $severity, $file, $line);
        }
    );
    
    class Database {
        protected $connection;
        
        public function __construct() {
            if($this->checkConfig()) {
                include('config.php');
                $this->connection = $this->connect($dbhost, $dbuser, $dbpass, $dbname);
            }
        }
        
        public function connect($dbhost, $dbuser, $dbpass, $dbname) {
            try {
                $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            } catch(\Exception $e) {
                $conn = null;
                $_SESSION['errors'] = "<strong>Error: </strong>" . mysqli_connect_error();
                session_destroy();
            }
            
            return $conn;
        }

        public function checkConfig($path = 'app/config.php') {
            return file_exists($path);
        }

    }