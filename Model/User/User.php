<?php

    namespace App\Model\User;

    //require_once('../../vendor/autoload.php');

    use App\Model\Conection\Conection;
use PDO;

    class User extends Conection {
        // Attributes
        private $name;
        private $lastName;
        private $username;
        private $email;
        private $password;
        private $firm;

        public function __construct(){
            parent::__construct();
        }

        public function getName(){
            return $this->name;
        }

        public function getLastName(){
            return $this->lastName;
        }

        public function getUsername(){
            return $this->username;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getFirm(){
            return $this->firm;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function setLastName($lastName){
            $this->lastName = $lastName;
        }

        public function setUsername($username){
            $this->username = $username;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function setFirm($firm){
            $this->firm = $firm;
        }

        // Methods
        public function postUser(){
            $query = "INSERT INTO user VALUES(NULL, :nam, :las, :user, :ema, :pass, :fir)";
            
            $statement = $this->conn->prepare($query);
            $statement->execute(array(
                ":nam" => $this->getName(), ":las" => $this->getLastName(), ":user" => $this->getUsername(),
                ":ema" => $this->getEmail(), ":pass" => $this->getPassword(), ":fir" => $this->getFirm()
            ));

            return $statement->rowCount() > 0 ? true : false;
        }

        public function getUser($id = "", $username = ""){
            $query = "SELECT * FROM user WHERE " . ($username != "" ? "username = :user" : "id = :id");
            
            $statement = $this->conn->prepare($query);
            if($username != ""){
                $statement->execute(array(":user" => $username));
            }else{
                $statement->execute(array(":id" => $id));
            }

            if($statement->rowCount() > 0){
                return $username != "" ? $statement->fetch(PDO::FETCH_OBJ) : $statement->fetchAll(PDO::FETCH_ASSOC);
            }else {
                return null;
            }
        }

        public function updateUser($id, $request){

        }
    }
?>