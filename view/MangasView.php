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
  function mostrarCrearMangas($categorias, $message = ''){
    $this->asignarMangasForm();
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->assign('message', $message);
    $this->smarty->display('templates/formManga.tpl');
  }

  function errorCrear($error, $nombre, $autor, $imagen, $descripcion, $id_categoria){
    $this->asignarMangasForm();
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/formMangas.tpl');
  }

  private function asignarMangasForm($nombre='', $autor='', $imagen='', $descripcion='', $id_categoria=''){
    $this->smarty->assign('nombre', $nombre);
    $this->smarty->assign('imagen', $imagen);
    $this->smarty->assign('autor', $autor);
    $this->smarty->assign('descripcion', $descripcion);
    $this->smarty->assign('id_categoria', $id_categoria);
  }
}

 ?>