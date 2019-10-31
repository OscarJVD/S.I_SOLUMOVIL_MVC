<?php
class Servicio
{
    private $dbh;

    
    public function __construct()
    { 
       $this->dbh = Database::connection(); 
    }


    public function getall()
    {
      try{
        
         $stmt = $this->dbh->prepare("SELECT * FROM Consulta_Servicios");
         $stmt->execute();
         return $stmt->fetchAll();


        }catch(Exception $e){
          exit($e->getMessage());
        }
    }


    public function getone($id)
    {
      try{
        
        $stmt = $this->dbh->prepare("SELECT * FROM Servicio WHERE id_servicio_PK = ? and inactivacion_servicio = 0");
        $stmt->execute(array($id));
        return $stmt->fetch();

       }catch(Exception $e){
         exit($e->getMessage());
       }
    }




    public function insert($data)
    { 
         try{
           $sql = "INSERT INTO Servicio(id_categoria_servicio_FK,
                                       descripcion_servicio,
                                       precio_servicio) VALUES (?,?,?)";

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array(
              $data["categoria"],
              $data["descripcion"],
              $data["precio"]
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
          $sql = "UPDATE Servicio SET id_categoria_servicio_FK = ?,
                                      descripcion_servicio     = ?,
                                      precio_servicio          = ?,
                                      id_estado_FK             = ?
                                 WHERE id_servicio_PK = ? ";

            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array(
                                $data["categoria"],
                                $data["descripcion"],
                                $data["precio"],
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

        $sql = "UPDATE Servicio SET inactivacion_servicio = 1 WHERE id_servicio_PK = ?";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($id));
        return true;

      }catch(Exception $e){
        exit($e->getMessage());
      }
    }



    public function categorias()
    { 
      try{

        $sql = "SELECT * FROM Categoria_Servicio WHERE inactivacion_categoria = 0";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
      }catch(Exception $e){
        exit($e->getMessage());
      }
    }
}
?>