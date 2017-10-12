<?php
include_once('model/CategoriasModel.php');
include_once('model/MangasModel.php');
include_once('view/CategoriaView.php');

class CategoriaController extends Controller
{

  function __construct()
  {
    $this->view = new CategoriaView();
    $this->model = new CategoriasModel();
    $this->mangaModel = new MangasModel();
  }

  public function index()
  {
    $categorias = $this->model->getCategorias();    
    $this->view->mostrarCategorias($categorias);
  }
  public function create()
  {
    $this->view->mostrarCrearCategorias();
  }
  public function mangasPorCategoria(){
    $id_categoria= $_POST['id_categoria']; 
    $mangas = $this->mangaModel->getMangas($id_categoria);
    $this->view->mostrarMangasPorCategoria($mangas);
  }

}