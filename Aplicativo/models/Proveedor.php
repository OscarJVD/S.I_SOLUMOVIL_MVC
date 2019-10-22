<?php
class Proveedor
{
    private $dbh;

    
    public function __construct()
    { 
       $this->dbh = Database::connection(); 
    }


    public function getall()
    {
      try{
        
         $stmt = $this->dbh->prepare("SELECT * FROM Proveedor where inactivacion_proveedor = 1");
         $stmt->execute();
         return $stmt->fetchAll();


        }catch(Exception $e){
          exit($e->getMessage());
        }
    }


    public function getone($id)
    {
      try{
        
        $stmt = $this->dbh->prepare("SELECT * FROM Proveedor WHERE id_proveedor_PK = ? and inactivacion_proveedor = 1");
        $stmt->execute(array($id));
        return $stmt->fetch();

       }catch(Exception $e){
         exit($e->getMessage());
       }
    }


    public function insert($data)
    { 
         try{
           $sql = "INSERT INTO Proveedor(nombre_proveedor,
                                         apellido_proveedor,
                                         direccion_proveedor,
                                         telefono_proveedor
                                          ) VALUES (?,?,?,?)";

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array(
              $data["nombre"],
              $data["apellido"],
              $data["direccion"],
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
          $sql = "UPDATE Proveedor SET  nombre_proveedor             = ?,
                                      apellido_proveedor           = ?,
                                      direccion_proveedor          = ?,
                                      telefono_proveedor           = ?,
                                      id_estado_FK               = ?
                                 WHERE id_proveedor_PK = ? ";

            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array(
                                $data["nombre"],
                                $data["apellido"],
                                $data["direccion"],
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

        $sql = "UPDATE Proveedor SET inactivacion_proveedor = 0 WHERE id_proveedor_PK = ?";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($id));
        return true;

      }catch(Exception $e){
        exit($e->getMessage());
      }
    }
}
?>