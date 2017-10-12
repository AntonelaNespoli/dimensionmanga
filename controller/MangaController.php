<?php
include_once('model/MangasModel.php');
include_once('view/MangasView.php');

class MangaController extends Controller
{

  function __construct()
  {
    $this->view = new MangasView();
    $this->model = new MangasModel();
  }

  public function index()
  {
    $mangas = $this->model->getMangas();    
    $this->view->mostrarMangas($mangas);
  }

  public function create()
  {
    $this->view->mostrarCrearMangas();
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
      $id_categoria =  $_POST['id_categoria'];
      $this->model->guardarTarea($nombre, $autor, $imagen, $descripcion, $id_categoria);
      echo json_encode(['message' => 'La operación se completo con exito.']);
    } else {
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

  public function destroy($params)
  {
    $id_manga = $params[0];
    $this->model->borrarManga($id_manga);
    header('Location: '.HOME);
  }
  
}