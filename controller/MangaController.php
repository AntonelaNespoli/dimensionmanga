<?php
include_once('model/MangasModel.php');
include_once('view/MangasView.php');
include_once('model/CategoriasModel.php');

class MangaController extends Controller
{

  function __construct()
  {
    $this->view = new MangasView();
    $this->model = new MangasModel();
    $this->c_model = new CategoriasModel();
  }

  public function index()
  {
    $mangas = $this->model->getMangas();    
    $this->view->mostrarMangas($mangas);
  }

  public function create()
  {
    $categorias = $this->c_model->getCategorias();
    $this->view->mostrarCrearMangas($categorias);
  }

  public function descripcion(){
    $id_manga= $_POST['id_manga']; 
    $manga = $this->model->getManga($id_manga);
    $this->view->mostrarManga($manga);
  }

  public function store()
  {
    if (UsuarioModel::isLoggedIn()) {
      $nombre = $_POST['nombre'];
      $autor = $_POST['autor'];
      $imagen = $_POST['imagen'];
      $descripcion = $_POST['descripcion'];
      $categoria =  $_POST['categoria'];
      $this->model->guardarManga($nombre, $autor, $imagen, $descripcion, $categoria);
      echo json_encode(['message' => 'La operación se completo con exito.']);
    } else {
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

  public function destroy($params)
  {
    if (UsuarioModel::isLoggedIn()) {
    $id_manga = $params[0];
    $this->model->borrarManga($id_manga);
    echo json_encode(['message' => 'La operación se completo con exito.']);
  } else {
    $this->view->errorCrear($error, $nombre, $autor, $imagen, $descripcion, $id_categoria);
    echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
  }
  }
  
}