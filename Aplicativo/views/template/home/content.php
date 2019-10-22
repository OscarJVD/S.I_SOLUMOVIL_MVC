
<?php
     require_once "views/template/home/header.php";
     require_once "views/template/home/selectHandler.php"; //maneejador de seleccion
     require_once "views/template/home/navbar.php";
     require_once "views/template/home/sidebar.php";
?>


          <!-- Miga de Pan-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo $link?>"><?php echo $name; ?></a>
                </li>
                <li class="breadcrumb-item active"><?php echo $metodo; ?></li>
            </ol>
          <?php require_once "views/template/home/errorHandlerHome.php";?>
          <?php require "views/".$content; ?>

<?php
        require_once "views/template/home/footer.php";
?>