<?php 
    namespace Conection;
    
    require_once('../../autoload.php');

    use PDO;
    use PDOException;

    class Conection {
        // Atributes
        protected $conn;
        protected $host;
        protected $dbName;
        protected $user;
        protected $password;

        public function __construct(){
            // Define variables
            $this->host = "localhost";
            $this->dbName = "login-docente";
            $this->user = "root";
            $this->password = "";

            $this->getConnection();
        }

        // Methods
        public function getConnection(){
            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->user, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->exec("SET CHARACTER SET utf8");
            } catch (PDOException $th) {
                echo("Conexion fallida: " . $th->getMessage());
            }
        }
    }
