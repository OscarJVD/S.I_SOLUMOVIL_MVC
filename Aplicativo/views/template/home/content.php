<?php
     require_once "views/template/home/header.php";
     require_once "views/template/home/menuTop.php";
     require_once "views/template/home/menuLeft.php";

?>
<br>
<div class="container">
    <?php require "views/".$content;?>
</div>

<?php
        require_once "views/template/home/footer.php";
?>