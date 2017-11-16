<?php
class CategoriaView extends View
{
  function mostrarCategorias($categorias){
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->display('templates/categorias.tpl');
  }
  function mostrarMangasPorCategoria($mangas, $id_categoria){
    $this->smarty->assign('isLoggedIn', UsuarioModel::isLoggedIn());
    $this->smarty->assign('mangas', $mangas);
    $this->smarty->assign('categoria', $id_categoria);
    $this->smarty->display('templates/mangas.tpl');
  }
  function mostrarCrearCategorias($categoria = null){
    if ($categoria){
      $this->smarty->assign('categoria',$categoria);
    }
    $this->smarty->display('templates/formCategoria.tpl');
  }

  function errorCrear($error, $nombre){
    $this->smarty->assign('nombre',$nombre);
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/formCategorias.tpl');
  }
}

 ?>