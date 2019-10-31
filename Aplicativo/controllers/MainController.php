<?php
class MainController
{   
    private $model;
    public function __construct(){
        if(empty($_SESSION["id_user"]) || !isset($_SESSION["id_user"])){
            header("location:?msg=session_expired&type=info");
         }     
        }
        public function index(){
           
        $link = "?c=main";
        $name = "Dashboard";
        $metodo = "Vista Principal";
        $content = "home/content.php";
        require_once "views/template/home/content.php";
    }


}
?>