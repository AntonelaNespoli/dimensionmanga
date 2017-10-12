<?php
class CategoriaView extends View
{
  function mostrarCategorias($categorias){
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->display('templates/categorias.tpl');
  }
  function mostrarMangasPorCategoria($mangas){
    $this->smarty->assign('mangas', $mangas);
    $this->smarty->display('templates/mangas.tpl');
  }
  function mostrarCrearCategorias(){
    $this->asignarCategoriasForm();
    $this->smarty->display('templates/abmCategorias.tpl');
  }

  function errorCrear($error, $nombre){
    $this->asignarCategoriasForm($nombre);
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/abmCategorias.tpl');
  }

  private function asignarCategoriasForm($nombre=''){
    $this->smarty->assign('nombre', $nombre);
  }
}

 ?>