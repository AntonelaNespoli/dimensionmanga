<?php
class MangasView extends View
{
  function mostrarMangas($mangas){
    $this->smarty->assign('mangas', $mangas);
    $this->smarty->assign('isLoggedIn', UsuarioModel::isLoggedIn());
    $this->smarty->display('templates/mangas.tpl');
  }
  function mostrarManga($manga){
    $this->smarty->assign('manga', $manga);
    $this->smarty->display('templates/mangaModal.tpl');
  }
  function mostrarCrearMangas($categorias, $manga = null){
    $this->smarty->assign('categorias', $categorias);
    if ($manga) {
      $this->smarty->assign('manga', $manga);
    }
    $this->smarty->display('templates/formManga.tpl');
  }
  
}

 ?>