<?php
class UsuarioModel extends Model
{
  function getUser($userMail){
    $sentencia = $this->db->prepare( "select * from usuario where mail = ? limit 1");
    $sentencia->execute([$userMail]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  ?>