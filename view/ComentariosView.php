<?php
class ComentariosView extends View
{
  function mostrarComentarios($comentarios, $users){
    $this->smarty->assign('comentarios', $comentarios);
    $this->smarty->assign('users', $users);
    $this->smarty->assign('isLoggedIn', UsuarioModel::isLoggedIn());
    $this->smarty->assign('isSuperUser', UsuarioModel::isSuperUser());
    $this->smarty->display('templates/comentarios.tpl');
  }
}
?>