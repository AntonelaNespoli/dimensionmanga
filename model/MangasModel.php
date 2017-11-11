<?php
class MangasModel extends Model
{
  function getMangas($id_categoria = null){
    if($id_categoria == null){
    $sentencia = $this->db->prepare( "select manga.*,c.nombre as categoria from manga left join categoria as c on c.id_categoria = manga.id_categoria");
    $sentencia->execute();
    }else{
      $sentencia = $this->db->prepare( "select manga.*,c.nombre as categoria from manga left join categoria as c on c.id_categoria = manga.id_categoria where manga.id_categoria = ?");
      $sentencia->execute([$id_categoria]);
    } 
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getManga($id_manga){
    $sentencia  = $this->db->prepare( "select manga.*,c.nombre as categoria from manga left join categoria as c on c.id_categoria = manga.id_categoria where manga.id_manga = ?");
    $sentencia->execute([$id_manga]);
    return $sentencia->fetch();
  }
  private function subirImagenes($imagenes){
    $rutas = [];
    foreach ($imagenes as $imagen) {
      $tipo = $_FILES[$imagen]['type'];
      $destino_final = 'images/' . uniqid() .'.'. $tipo;
      move_uploaded_file($imagen, $destino_final);
      $rutas[] = $destino_final;
    }
    return $rutas;
  }

  function guardarManga($nombre, $autor, $descripcion, $id_categoria, $imagenes){
    $sentencia = $this->db->prepare('INSERT INTO manga(nombre, autor, descripcion, id_categoria) VALUES(?,?,?,?)');
    $sentencia->execute([$nombre, $autor, $descripcion, $id_categoria]);
    $id_manga = $this->db->lastInsertId();
    $rutas = $this->subirImagenes($imagenes);
    $sentencia_imagenes = $this->db->prepare('INSERT INTO imagen(fk_id_manga, ruta) VALUES(?,?)');
    foreach ($rutas as $ruta) {
      $sentencia_imagenes->execute([$id_manga,$ruta]);
    }
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
