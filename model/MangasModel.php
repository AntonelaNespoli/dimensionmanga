<?php
class MangasModel extends Model
{
  function getMangas(){
    $sentencia = $this->db->prepare( "select manga.*,c.nombre as categoria from manga left join categoria as c on c.id_categoria = manga.id_categoria");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getManga($id_manga){
    $sentencia  = $this->db->prepare( "select manga.*,c.nombre as categoria from manga left join categoria as c on c.id_categoria = manga.id_categoria where manga.id_manga = ?");
    $sentencia->execute([$id_manga]);
    return $sentencia->fetch();
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
