<?php
class MangasModel extends Model
{
  function getMangas(){
    $sentencia = $this->db->prepare( "select * from manga");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function guardarManga($nombre, $autor, $imagen, $descripcion, $id_categoria){
    $sentencia = $this->db->prepare('INSERT INTO manga(nombre, autor, imagen, descripcion, id_categoria) VALUES(?,?,?,?,?)');
    $sentencia->execute([$nombre, $autor, $imagen, $descripcion, $id_categoria]);
  }

  function editarManga($id_manga,$nombre, $autor, $imagen, $descripcion, $id_categoria){
    $sentencia = $this->db->prepare( "update from manga where id_manga=?");
    $sentencia->execute([$id_manga, $nombre, $autor, $imagen, $descripcion, $id_categoria]);
  }

  function borrarManga($id_manga){
    $sentencia = $this->db->prepare( "delete from manga where id_manga=?");
    $sentencia->execute([$id_manga]);
  }
}

 ?>
