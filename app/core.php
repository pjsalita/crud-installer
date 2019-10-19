<?php
    namespace App;

    
    use App\Database;

    class Core extends Database {

        public function __construct() {
            if(!$this->checkConfig())
                header("Location: install");

            $this->connection = (new Database)->connection;

            if(isset($_GET['i']) || (isset($_POST) && !empty($_POST)))
                return $this->getRequest();

            include('app/views/layout.php');
        }
        
        public function sanitize($value) {
            $return = mysqli_real_escape_string($this->connection, $value);
            return $return;
        }

        public function index() {
            $announcements = [];
            $announcements['results'] = [];

            $result = $this->connection->query("SELECT * FROM announcements");

            if($result) {
                foreach($result as $row) {
                    array_push($announcements['results'], $row);
                }
                
                $announcements['success'] = true;

                echo json_encode($announcements);
            }
        }

        public function create() {
            $title = $this->sanitize($_POST['title']);
            $description = $this->sanitize($_POST['description']);
            
            $this->connection->query("INSERT INTO `announcements` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES (NULL, '$title', '$description', NOW(), NOW());");

            return header("Location: ./");
        }

        public function read($id) {
            $result = $this->connection->query("SELECT * FROM announcements WHERE id = {$id}");

            if($result->num_rows){
                $row = $result->fetch_array();
                echo json_encode($row);
            }
        }

        public function update($id) {
            $id = $this->sanitize($id);
            $title = $this->sanitize($_POST['title']);
            $description = $this->sanitize($_POST['description']);
            
            $this->connection->query("UPDATE `announcements` SET `title` = '$title', `description` = '$description', `updated_at` = NOW() WHERE id = '$id'");

            return header("Location: ./");
        }

        public function delete($id) {
            $id = $this->sanitize($id);
            
            $this->connection->query("DELETE FROM `announcements` WHERE id = '$id'");

            return header("Location: ./");
        }

        public function getRequest() {
            if(isset($_POST['_method'])) {
                $method = $_POST['_method'];
                $id = isset($_POST['id']) ? $_POST['id'] : 0;

                if($method == 'POST') {
                    return $this->create();
                } elseif($method == 'GET') {
                    return $this->read($id);
                } elseif($method == 'PUT') {
                    return $this->update($id);
                } elseif($method == 'DELETE') {
                    return $this->delete($id);
                }
            } elseif(isset($_GET['i'])) {
                return $this->index();
            }
        }
        
    }
