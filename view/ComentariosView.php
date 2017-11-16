<?php
class ComentariosView extends View
{
  function mostrarComentarios($comentarios, $usuarios){
    $this->smarty->assign('comentarios', $comentarios);
    $this->smarty->assign('usuarios', $usuarios);
    $this->smarty->assign('isLoggedIn', UsuarioModel::isLoggedIn());
    $this->smarty->assign('isSuperUser', UsuarioModel::isSuperUser());
    $this->smarty->display('templates/comentarios.tpl');
  }
}
?>