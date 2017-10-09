<?php
class CategoriasModel extends Model
{
  function getCategorias(){
    $sentencia = $this->db->prepare( "select * from categoria");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function guardarCategoria($nombre){
    $sentencia = $this->db->prepare('INSERT INTO categoria(nombre) VALUES(?)');
    $sentencia->execute([$nombre]);
  }

  function editarCategoria($nombre, $id_categoria){
    $sentencia = $this->de->prepare("update from categoria where id_categoria=?");
    $sentencia->execute([$nombre, $id_categoria]);
  }
  
  function borrarCategoria($id_categoria){
    $sentencia = $this->db->prepare( "delete from categoria where id_categoria=?");
    $sentencia->execute([$id_categoria]);
  }
}

 ?>
