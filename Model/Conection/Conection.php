<?php 
    namespace Conection;
    
    require_once('../../autoload.php');

    use PDO;
    use PDOException;

    class Conection {
        
        private $conn;

        public function __construct(){
            $this->getConnection();
        }

        public function getConnection(){
            try {
                $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->exec("SET CHARACTER SET utf8");
            } catch (PDOException $th) {
                echo("Conexion fallida: " . $th->getMessage());
            }
        }
    }
