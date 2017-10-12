<?php
class UsuarioModel extends Model
{

  function __construct() {
    session_start();
    parent::__construct();
  }

  function getUser($userMail){
    $sentencia = $this->db->prepare( "select * from usuario where mail = ? limit 1");
    $sentencia->execute([$userMail]);
    return $sentencia->fetch();
  }
  
  /**
   * Use to check if user is logged in
   * UsuarioModel::isLoggedIn()
   */
  static function isLoggedIn() {
    return isset($_SESSION['USER']) && (time() - $_SESSION['LAST_ACTIVITY'] > 999);
  }
}
?>