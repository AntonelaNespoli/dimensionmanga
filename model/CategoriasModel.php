<?php
class CategoriasModel extends Model
{
  function getCategorias(){
    $sentencia = $this->db->prepare( "SELECT * FROM categoria");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getCategoria($id_categoria){
    $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
    $sentencia->execute([$id_categoria]);
    return $sentencia->fetch();
  }

  function guardarCategoria($nombre){
    $sentencia = $this->db->prepare('INSERT INTO categoria(nombre) VALUES(?)');
    $sentencia->execute([$nombre]);
  }

  function editarCategoria($nombre, $id_categoria){
    $sentencia = $this->db->prepare("UPDATE categoria SET nombre = ? WHERE id_categoria=?");
    $sentencia->execute([$nombre, $id_categoria]);
  }
  
  function borrarCategoria($id_categoria){
    $sentencia = $this->db->prepare( "DELETE FROM categoria WHERE id_categoria=?");
    return $sentencia->execute([$id_categoria]);
  }
}

 ?>
