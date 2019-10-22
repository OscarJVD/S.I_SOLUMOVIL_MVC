<?php
require_once "models/User.php";

class AuthController
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }


    public function index()
    {  
        session_destroy();
        require_once "views/template/login/header.php";
        require_once "views/login/login_user.php";
        require_once "views/template/login/footer.php";
    }


    public function index_pass(){

        if(empty($_SESSION["nickname_user"]) || !isset($_SESSION["nickname_user"])){
            header("location:?you_dont_have_access");
         }

         unset($_SESSION["id_user"]);
         require_once "views/template/login/header.php";
         require_once "views/login/login_pass.php";
         require_once "views/template/login/footer.php"; 
    }


    public function login()
    {
        $user = isset($_POST["user"]) ? filter_var($_POST["user"],FILTER_SANITIZE_EMAIL) : false;
        $pass = isset($_POST["password"]) ? $_POST["password"] : false;

        if(strlen($pass) >= 0 && isset($_SESSION["nickname_user"])){
            // se verifica si el password existe 
              $response = $this->model->loginPass($pass);
              if($response){
                     header("location:?c=main");
                }else{
                     header("location:?c=auth&m=index_pass&msg=user_not_found&type=danger");
                }
        }else{

              $response = $this->model->loginUser($user);
              if($response){
                    header("location:?c=auth&m=index_pass");
                }else{
                    header("location:?msg=user_not_found&type=danger");
               }
       
        }

    }
}
?>