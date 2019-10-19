<?php
    require('database.php');
    
    use App\Database;

    class Install extends Database {

        public function run() {
            if(isset($_POST) && !empty($_POST)) {
                $dbhost = $_POST["dbhost"];
                $dbuser = $_POST["dbuser"];
                $dbpass = $_POST["dbpass"];
                $dbname = $_POST["dbname"];

                $conn = $this->connect(
                    $dbhost,
                    $dbuser,
                    $dbpass,
                    $dbname
                );

                if($conn) {
                    $sql = explode(";", file_get_contents("install.sql"));

                    foreach($sql as $query) {
                        $conn->query($query);
                    }

                    $config = file_get_contents("install.config");
                    $config = str_replace("%dbhost%", $dbhost, $config);
                    $config = str_replace("%dbuser%", $dbuser, $config);
                    $config = str_replace("%dbpass%", $dbpass, $config);
                    $config = str_replace("%dbname%", $dbname, $config);
                    
                    file_put_contents("../app/config.php", $config);

                    header("Location: ..");
                }
            }
            
            return $this->checkConfig('../app/config.php');
        }
        
    }