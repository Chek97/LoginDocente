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

        public function loginUser(){

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
        if($formValidator){
            session_start();
            $_SESSION['message'] = "La informacion no es correcta, intentelo mas tarde";
            $_SESSION['status'] = "warning";
            header("location: ../../View/Register/Register.php");
        }else{
            // Si el formulario es correcto entonces ingresar datos a la BD
            $request = $userController->createUser($_POST, $_FILES);
            session_start();
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

?>