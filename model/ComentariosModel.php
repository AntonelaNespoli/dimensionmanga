<?php
class ComentariosModel extends Model
{
  function getComments($id_manga){
    $sentencia = $this->db->prepare("SELECT * FROM comentario WHERE fk_id_manga = ?");
    $sentencia->execute([$id_manga]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function createComment($comentario, $puntaje, $id_manga, $id_usuario){
    $sentencia = $this->db->prepare('INSERT INTO comentario(comentario, puntaje, fk_id_manga, fk_id_usuario) VALUES(?,?,?,?)');
    $sentencia->execute([$comentario, $puntaje, $id_manga, $id_usuario]);
  }
  
  function deleteComment($id){
    $sentencia = $this->db->prepare( "DELETE FROM comentarios WHERE id_comentario = ?");
    return $sentencia->execute([$id]);
  }
}

 ?>
