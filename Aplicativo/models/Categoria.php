<?php
class Categoria
{
    private $dbh;
    
    public function __construct()
    { 
       $this->dbh = Database::connection(); 
    }


    public function getall($tipo)
    {
      try{
        $type = "Categoria_".ucwords($tipo);
         $stmt = $this->dbh->prepare("SELECT * FROM {$type} WHERE inactivacion_categoria = 0");
         $stmt->execute();
         return  $stmt->fetchAll();

        }catch(Exception $e){
          exit($e->getMessage());
        }
    }


    public function getone($id,$type)
    {
      try{
        
        $stmt = $this->dbh->prepare("SELECT * FROM Categoria_{$type} WHERE id_categoria_{$type}_PK = ? and inactivacion_categoria = 0");
        $stmt->execute(array($id));
        return $stmt->fetch();


       }catch(Exception $e){
         exit($e->getMessage());
       }
    }




    public function insert($data)
    { 
         try{
          $type = filter_var($data["tipo"],FILTER_SANITIZE_STRING);

           $sql = "INSERT INTO Categoria_{$type}(nombre_categoria_{$type},
                                                 descripcion_categoria_{$type}) VALUES (?,?)";

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array(
              $data["nombre"],
              $data["descripcion"],
        ));
        return true;
 
         }catch(Exception $e){
           exit($e->getMessage());
         }
    }


    public function update($data)
    {   
      try{
          $type = filter_var($data["tipo"],FILTER_SANITIZE_STRING);
          $id = filter_var($data["id"],FILTER_SANITIZE_NUMBER_INT);

          $sql = "UPDATE Categoria_{$type} SET nombre_categoria_{$type}       = ?,
                                               descripcion_categoria_{$type}  = ?,
                                               id_estado_FK = ?
                                 WHERE id_categoria_{$type}_PK = ? ";

            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array(
                                $data["nombre"],
                                $data["descripcion"],
                                $data["estado"],
                                $id));
          
          return true;

        }catch(Exception $e){
          exit($e->getMessage());
        }
    }



    public function delete($id,$type)
    { 
      try{

        $update = ucwords($type);
        $sql = "UPDATE Categoria_{$update} SET inactivacion_categoria = 1 WHERE id_categoria_{$type}_PK = ?";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($id));
        return true;

      }catch(Exception $e){
        exit($e->getMessage());
      }
    }
}
?>