<?php
class Cliente
{
    private $dbh;

    
    public function __construct()
    { 
       $this->dbh = Database::connection(); 
    }


    public function getall()
    {
      try{
        
         $stmt = $this->dbh->prepare("SELECT * FROM Cliente where inactivacion_cliente = 0");
         $stmt->execute();
         return $stmt->fetchAll();


        }catch(Exception $e){
          exit($e->getMessage());
        }
    }


    public function getone($id)
    {
      try{
        
        $stmt = $this->dbh->prepare("SELECT * FROM Cliente WHERE id_cliente_PK = ? and inactivacion_cliente = 0");
        $stmt->execute(array($id));
        return $stmt->fetch();

       }catch(Exception $e){
         exit($e->getMessage());
       }
    }




    public function insert($data)
    { 
         try{
           $sql = "INSERT INTO Cliente(id_tipo_documento_FK,
                                       numero_documento_cliente,
                                       nombre_cliente,
                                       apellido_cliente,
                                       direccion_cliente,
                                       correo_cliente,
                                       telefono_cliente
                                       ) VALUES (?,?,?,?,?,?,?)";

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array(
              $data["tipoDocumento"],
              $data["numeroDocumento"],
              $data["nombre"],
              $data["apellido"],
              $data["direccion"],
              $data["correo"],
              $data["telefono"]
        ));
          return true;
 
         }catch(Exception $e){
           exit($e->getMessage());
         }
    }


    public function update($data)
    {   
      try{
          $id = filter_var($data["id"],FILTER_SANITIZE_NUMBER_INT);
          $sql = "UPDATE Cliente SET  id_tipo_documento_FK       = ?,
                                      Numero_documento_cliente   = ?,
                                      nombre_cliente             = ?,
                                      apellido_cliente           = ?,
                                      direccion_cliente          = ?,
                                      correo_cliente             = ?,
                                      telefono_cliente           = ?,
                                      id_estado_FK               = ?
                                 WHERE id_cliente_PK = ? ";

            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array(
                                $data["tipoDocumento"],
                                $data["numeroDocumento"],
                                $data["nombre"],
                                $data["apellido"],
                                $data["direccion"],
                                $data["correo"],
                                $data["telefono"],
                                $data["estado"],
                                $id));
          
          return true;

        }catch(Exception $e){
          exit($e->getMessage());
        }
    }




    public function delete($id)
    { 
      try{

        $sql = "UPDATE Cliente SET inactivacion_cliente = 1 WHERE id_cliente_PK = ?";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($id));
        return true;

      }catch(Exception $e){
        exit($e->getMessage());
      }
    }

    
    public function tipoDocumento()
    { 
      try{
        $sql = "SELECT * FROM Tipo_Documento";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

      }catch(Exception $e){
        exit($e->getMessage());
      }
    }

    public function busquedaCliente($termino){
      try{
        $sql = "SELECT * FROM Cliente where  inactivacion_cliente = 0  and (nombre_cliente like '%' ? '%' or apellido_cliente like  '%' ? '%') ";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($termino,$termino));
        return $stmt->fetchAll();

      }catch(Exception $e){
        exit($e->getMessage());
      }
    }
}
?>