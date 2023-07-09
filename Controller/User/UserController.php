<?php 
    include_once('../../autoload.php');

    use Models\User\User;

    class UserController {
        // Attributes
        private $user;

        public function getUser(){
            return $this->user;
        }

        public function setUser($user){
            $this->user = $user;
        }

        public function __construct(){
            $this->user = new User();
        }

        // Methods
        public function createUser($request, $images){
            // Encript password
            $newPassword = password_hash($request['password'], PASSWORD_DEFAULT);
            
            //getImage
            $directory = '../../Public/img/';
            $fileName = $images['firm']['name'];
            $tempFile = $images['firm']['tmp_name'];

            $newFileName = uniqid() . '-' . $fileName;

            if(move_uploaded_file($tempFile, $directory . $newFileName)){
                $this->user->setName($request['name']);
                $this->user->setLastName($request['last_name']);
                $this->user->setUsername($request['userna,e']);
                $this->user->setEmail($request['email']);
                $this->user->setPassword($newPassword);
                $this->user->setFirm($directory . $newFileName);

                $post = $this->user->postUser();
                return $post ? true : false;
            }else{
                return false;
            }
        }

        public function loginUser(){

        }

        public function logoutUser(){

        }

        public function updateUser(){

        }
    }

    $userController = new UserController();

    // Create Method
    if($_GET['act'] == "create" && isset($_POST['submit_user'])){
        $request = $userController->createUser($_POST, $_FILES);
        if($request){
            echo("Se ejecuto con exito el usuario");
            /* session_start();
            $_SESSION['session'] = array("status" => "success", "message" => "Usuario creado con exito"); */
            // todo: obtener datos del usuario $_SESSION['user'] = array("id" => $request['id'], "")
        }else{
            echo("No fue posible crear");
        }
    }

?>