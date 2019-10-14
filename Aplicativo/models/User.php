<?php
include_once "helpers/encrypt_pass.php";

class User
{
    private $dbh;

    
    public function __construct()
    { 
       $this->dbh = Database::connection(); 
    }

    public function loginUser($user)
    {
      try{
       $sql = "select * from Usuario where nickname_usuario = :nickname";
       $stmt = $this->dbh->prepare($sql);
       $stmt->bindParam(":nickname",$user);
       $stmt->execute();
       $response = $stmt->fetch();

       if($response){
           $_SESSION["nickname_user"] = $response->nickname_usuario;
           $_SESSION["name_user"] = $response->nombres_usuario; 
           $_SESSION["lastname_user"] = $response->apellidos_usuario; 
           $_SESSION["img_user"] = $response->foto_usuario; 
      
           return true;
       }else{
   
        return false;
       }
      }catch(Exception $e){
          exit($e->getMessage());
      }
    }
    


   public function loginPass($pass){

    $sql = "select * from Usuario where nickname_usuario = :nickname";
    try{
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindParam(":nickname",$_SESSION["nickname_user"]);
      $stmt->execute();
      $response = $stmt->fetch();
      
      if(password_verify($pass,$response->clave_usuario)){

        $_SESSION["id_user"] = $response->id_usuario_PK;
        $_SESSION["rol_user"] = $response->id_rol_usuario_FK;   
        $_SESSION["email_user"] = $response->correo_usuario; 

        return true;
      }else{
        return false;
      }

    }catch(Exception $e){
      exit($e->getMessage());
    }
   }



    public function getall($num)
    {
      try{
      $size = 6;
      $page = 1;

      if(isset($num)):
           $page = $num;
      endif;

        
         $stmt = $this->dbh->prepare("select * from usuario");
         $stmt->execute();
         $rows = $stmt->rowCount();
         
         $paginate = ceil($rows / $size);
         $page = $page > $paginate ? 1 :$page;
         $ini = ($page - 1) * $size; 

         $sql = "select * from usuario limit $ini,$size";
         $stmt = $this->dbh->prepare($sql);
         $stmt->execute();
         $response = $stmt->fetchAll();

         $answer = array($response,$page,$paginate);
         return $answer;

        }catch(Exception $e){
          exit($e->getMessage());
        }
    }




    public function getone($id)
    {
      try{
        
        $stmt = $this->dbh->prepare("select * from usuario where id_usuario_PK = :id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $response = $stmt->fetch();

        return $response;
       }catch(Exception $e){
         exit($e->getMessage());
       }
    }




    public function insert($data)
    { 
         try{
           $sql = "insert into Usuario(id_tipo_documento_FK,
                                       numero_documento_usuario,
                                       nombres_usuario,
                                       apellidos_usuario,
                                       nickname_usuario,
                                       clave_usuario,
                                       correo_usuario,
                                       telefono_usuario,
                                       direccion_usuario,
                                       id_estado_FK,
                                       id_rol_usuario_FK,
                                       foto_usuario) values (:tipoDoc,
                                                                :numDoc,
                                                                :names,
                                                                :surnames,
                                                                :nickname,
                                                                :pass,
                                                                :email,
                                                                :tel,
                                                                :dir,
                                                                :est,
                                                                :rol,
                                                                :img)";

        $stmt = $this->dbh->prepare($sql);


               $rutadb = "assets/img/user/avatar.png";

      
        $password = encrypt_password($data["pass"]);

        $stmt->bindParam(":tipoDoc",$data["typeDoc"]);
        $stmt->bindParam(":numDoc",$data["numDoc"]);
        $stmt->bindParam(":names",$data["name"]);
        $stmt->bindParam(":surnames",$data["surname"]);
        $stmt->bindParam(":nickname",$data["nickname"]);
        $stmt->bindParam(":pass",$password);
        $stmt->bindParam(":email",$data["email"]);
        $stmt->bindParam(":tel",$data["tel"]);
        $stmt->bindParam(":dir",$data["dir"]);
        $stmt->bindParam(":est",$data["est"]);
        $stmt->bindParam(":rol",$data["rol"]);
        $stmt->bindParam(":img",$rutadb);

        $stmt->execute();

        return true;
         }catch(Exception $e){
           exit($e->getMessage());
         }
    }


    public function update($data,$img)
    {   
        $id = filter_var($data["id_user"],FILTER_SANITIZE_NUMBER_INT);
        $sql = "select clave_usuario from Usuario where id_usuario_PK = ?";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $response = $stmt->fetch();

        if($data["pass"] !== $response->clave_usuario){
               
               $pass = encrypt_password($data["pass"]);
               $sql = "update Usuario set clave_usuario = ? where id_usuario_PK = ?";
               $stmt = $this->dbh->prepare($sql);
               $stmt->bindParam(1,$pass);
               $stmt->bindParam(2,$data["id_user"]);
               $stmt->execute();
        }
        try{
          $sql = "update Usuario set id_tipo_documento_FK     = :tipoDoc,
                                     numero_documento_usuario = :numDoc,
                                     nombres_usuario          = :names,
                                     apellidos_usuario        = :surnames ,
                                     nickname_usuario         = :nickname,
                                     correo_usuario           = :email,
                                     telefono_usuario         = :tel,
                                     direccion_usuario        = :dir,
                                     id_estado_FK             = :est,
                                     id_rol_usuario_FK        = :rol,
                                     foto_usuario             = :img
                    where id_usuario_PK = :id";

        if(!empty($img["img"]["name"])){

                 $tmp = $img['img']['tmp_name'];
                 $img = basename($img['img']['name']);
                 $ruta = "assets/img/user".$data["id_user"];
                 $rutadb = $ruta."/".$img;
                
                 if(!file_exists($ruta)){
                      mkdir($ruta,0777,true);
                        if(file_exists($ruta)){
                          if($_SESSION["img_user"] != "assets/img/user/avatar.png"){
                                unlink($_SESSION["img_user"]);
                          }
                           move_uploaded_file($tmp,$ruta."/".$img);
                         }
                   }else{
                        if(file_exists($ruta)){
                          if($_SESSION["img_user"] != "assets/img/user/avatar.png"){
                                unlink($_SESSION["img_user"]);
                          }
                           move_uploaded_file($tmp,$ruta."/".$img);
                       }
                  }
          }else{
                  $rutadb = $_SESSION["img_user"];
              }

            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array(":tipoDoc"=>$data["typeDoc"], 
                                 ":numDoc"=>$data["numDoc"],
                                 ":names"=>$data["name"],
                                 ":surnames"=>$data["surname"],
                                 ":nickname"=>$data["nickname"],
                                 ":email"=>$data["email"],
                                 ":tel"=>$data["tel"],
                                 ":dir"=>$data["dir"],
                                 ":est"=>$data["est"],
                                 ":rol"=>$data["rol"],
                                 ":id"=>$data["id_user"],
                                 ":img"=>$rutadb
          ));
          
          return true;

        }catch(Exception $e){
          exit($e->getMessage());
        }
    }




    public function delete($id)
    {
      $ruta = "assets/img/user".$id;
          if(file_exists($ruta)){

              $sql = "select foto_usuario from Usuario where id_usuario_PK = ?";
              $stmt = $this->dbh->prepare($sql);
              $stmt->execute(array($id));
              $foto = $stmt->fetch();   
              $ruta_e = $foto->foto_usuario;
          
            if($ruta_e != "assets/img/user/avatar.png"){              
                
                 if(unlink($ruta_e)){
                      rmdir($ruta); 
                   }
             }
          }
      try{
        $sql = "delete from Usuario where id_usuario_PK = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return true;
      }catch(Exception $e){
        exit($e->getMessage());
      }
    }

    public function actualizar_img()
    {
 try{
        $stmt = $this->dbh->prepare("select * from usuario where id_usuario_PK = :id");
        $stmt->bindParam(":id",$_SESSION["id_user"]);
        $stmt->execute();
        $response = $stmt->fetch();
        $_SESSION["img_user"] = $response->foto_usuario; 

       }catch(Exception $e){
         exit($e->getMessage());
       }
    }
}
?>