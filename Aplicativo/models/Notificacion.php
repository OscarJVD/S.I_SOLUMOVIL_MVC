<?php

class Notificacion
{
    private $dbh;

    
    public function __construct()
    { 
       $this->dbh = Database::connection(); 

    }


    public function getall()
    {
        // $fecha = date("Y-m-d G:i:s");   
    try{
      $stmt = $this->dbh->prepare("SELECT * FROM Notificaciones where id_usuario_FK != ? and leido = 0");
      $stmt->execute(array($_SESSION["id_user"]));
      $sql = "SELECT * FROM notificacion_personalizada WHERE mi_usuario != ? AND id_usuario_FK = ? AND visualizado = 0;";
      $badge = $this->dbh->prepare($sql);
      $badge->execute(array($_SESSION["id_user"],$_SESSION["id_user"]));

      return array($stmt->fetchAll(),$badge->rowCount());
  
     }catch(Exception $e){
       exit($e->getMessage());
     }
  }
   
  public function actualizarVisualizado()
  {
    try{
        $stmt = $this->dbh->prepare("UPDATE Notificacion_Personalizada SET visualizado  = 1 where id_usuario_FK = ? ");
        $stmt->execute(array($_SESSION["id_user"]));
        return true;
    
       }catch(Exception $e){
         exit($e->getMessage());
       }
  }



  public function actualizarLeido($id)
  {
    try{
        $stmt = $this->dbh->prepare("UPDATE Notificaciones SET leido  = 1 where id_notificacion = ? and id_usuario_FK = ?");
        $stmt->execute(array($id,$_SESSION["id_user"]));
        return true;
    
       }catch(Exception $e){
         exit($e->getMessage());
       }
  }

  public function insertar($valor,$tipo)
  {
    try{
      // consulta den numero de usuarios
      $stmt = $this->dbh->prepare("SELECT id_usuario_PK  FROM usuario");
      $stmt->execute();
      $users = $stmt->fetchAll();
      // consulta del numero mas alto
      $stmt = $this->dbh->prepare("SELECT MAX(id_notificacion_PK) as numero_maximo FROM notificacion");
      $stmt->execute();
      $num = $stmt->fetch();
      $numMax = $num->numero_maximo == null ? 1 : $num->numero_maximo + 1 ;
        // registrar una notificacion
        $fecha = date("Y-m-d G:i:s");
        $sql = "INSERT INTO Notificacion values(?,?,?,?,?,?)";
        $stmt = $this->dbh->prepare($sql);
        $insert =  $stmt->execute(array($numMax,
                             $_SESSION["rol_user"],
                             $_SESSION["id_user"],
                             $valor,
                             $tipo,
                             $fecha));
        // registro de notificacion personalizada
      if($insert){
         foreach ($users as $user) {
      
              $sql = "INSERT INTO notificacion_personalizada values(?,?,?,?,?)";
              $stmt = $this->dbh->prepare($sql);
              $stmt->execute(array($numMax,
                                   $_SESSION["id_user"],
                                   $user->id_usuario_PK, 
                                   0,
                                   0));  
         }       
        }
       }catch(Exception $e){
         exit($e->getMessage());
       }
  }

  }
?>