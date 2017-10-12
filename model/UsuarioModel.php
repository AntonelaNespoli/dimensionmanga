<?php
class UsuarioModel extends Model
{

  function __construct() {
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
    session_start();
    $isLoggedIn = false;
    if (isset($_SESSION['USER']) && ((time() - (int)$_SESSION['LAST_ACTIVITY']) < 1800)) {
      $isLoggedIn = true;
      $_SESSION['LAST_ACTIVITY'] = time();      
    }
    return $isLoggedIn;
  }
}
?>