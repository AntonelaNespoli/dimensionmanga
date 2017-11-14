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
    $this->i_model = new ImagenesModel();
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
    $categoria = $this->model->getCategoria($id_categoria);
    $mangas = $this->mangaModel->getMangas($id_categoria);
    foreach ($mangas as $k => $manga){
      $mangas[$k]["imagenes"] = $this->i_model->getImagenes($manga["id_manga"]);
    }
    $this->view->mostrarMangasPorCategoria($mangas, $categoria);
  }

  public function store()
  {
    if (UsuarioModel::isLoggedIn()) {

      $nombre = $_POST['nombre'];
      $id_categoria = $_POST['id_categoria'];

      if (!empty($id_categoria)) {
        $this->model->editarCategoria($nombre, $id_categoria);
      } else {
        $this->model->guardarCategoria($nombre);
      }

      echo json_encode(['message' => 'La categoría se guardo exitosamente.']);
    } else {
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

  public function delete($params)
  {
    if (UsuarioModel::isLoggedIn()) {
    $id_categoria = $params[0];
    $this->model->borrarCategoria($id_categoria);
    echo json_encode(['message' => 'La categoría se elimino exitosamente.']);
  } else {
    echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
  }
  }

  public function edit($params) {
    if (UsuarioModel::isLoggedIn()) {
      $id_categoria = $params[0];
      $categoria = $this->model->getCategoria($id_categoria);
      $this->view->mostrarCrearCategorias($categoria);
    } else {
      header('Location: ' . HOME);
    }
  }

}