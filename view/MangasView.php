<?php
class MangasView extends View
{
  function mostrarMangas($mangas){
    $this->smarty->assign('mangas', $mangas);
    $this->smarty->display('templates/mangas.tpl');
  }
  function mostrarManga($manga){
    $this->smarty->assign('manga', $manga);
    $this->smarty->display('templates/mangaModal.tpl');
  }
  function mostrarCrearMangas(){
    $this->assignarMangasForm();
    $this->smarty->display('templates/abmMangas.tpl');
  }

  function errorCrear($error, $nombre, $autor, $imagen, $descripcion, $id_categoria){
    $this->assignarMangasForm($nombre, $autor, $imagen, $descripcion, $id_categoria);
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/abmMangas.tpl');
  }

  private function assignarMangasForm($nombre='', $autor='', $imagen='', $descripcion='', $id_categoria=''){
    $this->smarty->assign('nombre', $nombre);
    $this->smarty->assign('imagen', $imagen);
    $this->smarty->assign('autor', $autor);
    $this->smarty->assign('descripcion', $descripcion);
    $this->smarty->assign('id_categoria', $id_categoria);
  }
}

 ?>