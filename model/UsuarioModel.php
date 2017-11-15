<?php
class UsuarioModel extends Model
{

  function __construct() {
    parent::__construct();
  }

  function getUser($userMail){
    $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE mail = ? LIMIT 1");
    $sentencia->execute([$userMail]);
    return $sentencia->fetch();
  }
  
  function userExist($useMail){
    $sentencia = $this->db->prepare("SELECT mail.* FROM usuario WHERE mail = ? LIMIT 1");
    $sentencia->execute([$userMail]);
    return $sentencia->fetch();
  }

  function recordUser($userName, $userMail, $hash){
    $sentencia = $this->db->prepare('INSERT INTO usuario(nombre, mail, clave) VALUES(?,?,?)');
    $sentencia->execute([$userName,$userMail, $hash]);
  }

  /**
   * usar para chequear si el usuario esta logeado
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