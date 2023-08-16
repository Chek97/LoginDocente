<?php 

    namespace App\Controller\User;
    
    require_once('../../vendor/autoload.php');

    use App\Model\User\User;
    use App\Helpers\Validate;

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

            $newFileName = uniqid() . '-' . str_replace(' ', '', $fileName);

            if(move_uploaded_file($tempFile, $directory . $newFileName)){
                $this->user->setName($request['name']);
                $this->user->setLastName($request['last_name']);
                $this->user->setUsername($request['username']);
                $this->user->setEmail($request['email']);
                $this->user->setPassword($newPassword);
                $this->user->setFirm($newFileName);

                $post = $this->user->postUser();
                return $post ? true : false;
            }else{
                return false;
            }
        }

        public function findUser($username){
            $user = $this->user->getUser(username: $username);
            
            return $user != null ? true : false;
        }

        public function loginUser($request, $images){

            $this->user->setUsername($request['username']);
            $this->user->setEmail($request['email']);
            $this->user->setPassword($request['password']);
            $this->user->setFirm($images['firm']['name']);

            $userExist = $this->user->getUser(username: $this->user->getUsername());
            
            if($userExist != null){
                $firmData = explode('-', $userExist->firm);
                if($userExist->email == $this->user->getEmail() && 
                    password_verify($this->user->getPassword(), $userExist->password) &&
                    $firmData[1] == str_replace(' ', '', $this->user->getFirm())
                ){
                    return $userExist;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function logoutUser(){

        }

        public function updateUser(){

        }
    }

    $userController = new UserController();

    // Create Method
    if(isset($_POST['submit_user'])){
        // Validar si el formulario y la imagen son validos
        $formValidator = Validate::validateForm($_POST, $_FILES);
        session_start();

        if($formValidator){
            $_SESSION['message'] = "La informacion no es correcta, intentelo mas tarde";
            $_SESSION['status'] = "warning";
            header("location: ../../View/Register/Register.php");
        }else{
            // Si el formulario es correcto entonces ingresar datos a la BD
            $userExist = $userController->findUser($_POST['username']);
            if($userExist){
                $_SESSION['message'] = "Ya existe un usuario con ese nombre, porfavor intenta otro";
                $_SESSION['status'] = "warning";
                header("location: ../../View/Register/Register.php");
            }else{
                $request = $userController->createUser($_POST, $_FILES);
                // Si hay exito redirigir a la pantalla respectiva con su mensaje
                if($request){
                    $_SESSION['message'] = "El usuario fue creado exitosamente";
                    $_SESSION['status'] = "success";
                    header("location: ../../View/Login/Login.php");
                }else{
                    $_SESSION['message'] = "No fue posible crear al usuario, intentalo nuevamente";
                    $_SESSION['status'] = "danger";
                    header("location: ../../View/Register/Register.php");
                }
            }
        }
    }

    // Login Method
    if(isset($_POST['login_user'])){
        //Validar los campos del formulario
        $loginValidator = Validate::loginValidate($_POST, $_FILES);
        session_start();

        if($loginValidator){
            $_SESSION['message'] = "La informacion no es correcta, intentelo mas tarde";
            $_SESSION['status'] = "warning";
            header("location: ../../View/Login/Login.php");
        }else{
            $request = $userController->loginUser($_POST, $_FILES);
            if($request != null){
                $_SESSION['user'] = array(
                    "username" => $request->username,
                    "name" => $request->name,
                    "email" => $request->email,
                    "firm" => $request->firm,
                );
                header("location: ../../View/Main/Main.php");
            }else{
                $_SESSION['message'] = "El usuario no existe, intenta con otro";
                $_SESSION['status'] = "danger";
                header("location: ../../View/Login/Login.php");
            }
        }
    }

?>