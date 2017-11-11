<?php
class IndexView extends View
{
  function mostrarIndex(){
    $this->smarty->assign('isLoggedIn', UsuarioModel::isLoggedIn());    
    $this->smarty->display('templates/index.tpl');
  }
}

 ?>
