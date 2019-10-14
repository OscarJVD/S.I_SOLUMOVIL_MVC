<?php
class MainController
{
    public function __construct(){
        if(empty($_SESSION["id_user"]) || !isset($_SESSION["id_user"])){
            header("location:?you_dont_have_access");
         }
    }
    public function index(){
        
        $content = "home/content.php";
        require_once "views/template/home/content.php";
    }
}
?>