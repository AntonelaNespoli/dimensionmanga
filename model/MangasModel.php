<?php

class MangasModel extends Model
{
  function getMangas($id_categoria = null){
    if($id_categoria == null){
    $sentencia = $this->db->prepare( "SELECT manga.*,c.nombre AS categoria FROM manga LEFT JOIN categoria AS c ON c.id_categoria = manga.id_categoria");
    $sentencia->execute();
    }else{
      $sentencia = $this->db->prepare( "SELECT manga.*,c.nombre AS categoria FROM manga LEFT JOIN categoria AS c ON c.id_categoria = manga.id_categoria WHERE manga.id_categoria = ?");
      $sentencia->execute([$id_categoria]);
    } 
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getManga($id_manga){
    $sentencia  = $this->db->prepare( "SELECT manga.*,c.nombre AS categoria FROM manga LEFT JOIN categoria AS c ON c.id_categoria = manga.id_categoria WHERE manga.id_manga = ?");
    $sentencia->execute([$id_manga]);
    return $sentencia->fetch();
  }

  private function subirImagenes($imagenes, $id_manga){

    $rutas = [];

    foreach ($imagenes as $imagen) {
      $destino_final = 'images/' . uniqid() .'.'. $jpg;
      move_uploaded_file($imagen, $destino_final);
      $rutas[] = $destino_final;
    }

    $sentencia_imagenes = $this->db->prepare('INSERT INTO imagen(fk_id_manga, ruta) VALUES(?,?)');

    foreach ($rutas as $ruta) {
      $sentencia_imagenes->execute([$id_manga,$ruta]);
    }
  }

  function guardarManga($nombre, $autor, $descripcion, $id_categoria, $imagenes){
    $sentencia = $this->db->prepare('INSERT INTO manga(nombre, autor, descripcion, id_categoria) VALUES(?,?,?,?)');
    $sentencia->execute([$nombre, $autor, $descripcion, $id_categoria]);
    $id_manga = $this->db->lastInsertId();
    $this->subirImagenes($imagenes, $id_manga);
  }

  function editarManga($id_manga, $nombre, $autor, $descripcion, $id_categoria, $imagenes){
    $sentencia = $this->db->prepare( "UPDATE manga SET nombre = ?, autor = ?, descripcion = ?, id_categoria = ? WHERE id_manga=?");
    $sentencia->execute([$nombre, $autor, $descripcion, $id_categoria, $id_manga]);
    $this->subirImagenes($imagenes, $id_manga);
  }

  function borrarManga($id_manga){
    $sentencia = $this->db->prepare( "DELETE FROM manga WHERE id_manga=?");
    $sentencia->execute([$id_manga]);
  }
}

 ?>
