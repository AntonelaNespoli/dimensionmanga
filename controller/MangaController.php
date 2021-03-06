<?php
include_once('model/MangasModel.php');
include_once('view/MangasView.php');
include_once('model/CategoriasModel.php');
include_once('model/ImagenesModel.php');

class MangaController extends Controller
{

  function __construct()
  {
    $this->view = new MangasView();
    $this->model = new MangasModel();
    $this->c_model = new CategoriasModel();
    $this->i_model = new ImagenesModel();
  }

  public function index()
  {
    $mangas = $this->model->getMangas();
    foreach ($mangas as $k => $manga){
      $mangas[$k]["imagenes"] = $this->i_model->getImagenes($manga["id_manga"]);
      echo "<script>console.log(".json_encode($mangas).");</script>";              

    }
    $this->view->mostrarMangas($mangas);
  }

  public function create()
  {
    $categorias = $this->c_model->getCategorias();
    $this->view->mostrarCrearMangas($categorias);
  }

  public function edit($params) {
    if (UsuarioModel::isLoggedIn()) {
      $id_manga = $params[0];
      if ($id_manga){
        $categorias = $this->c_model->getCategorias();
        $this->view->mostrarCrearMangas($categorias, $this->model->getManga($id_manga), $this->i_model->getImagenes($id_manga));
      } else {
        $this->view->mostrarCrearMangas($categorias);
      }
    } else {
      header('Location: ' . HOME);
    }
  }

  public function descripcion(){
    $id_manga= $_POST['id_manga']; 
    $manga = $this->model->getManga($id_manga);
    $manga["imagenes"] = $this->i_model->getImagenes($manga["id_manga"]);
    $this->view->mostrarManga($manga);
  }

  public function store()
  {
    if (UsuarioModel::isLoggedIn()) {

      $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];
      $nombre = $_POST['nombre'];
      $autor = $_POST['autor'];
      $descripcion = $_POST['descripcion'];
      $categoria =  $_POST['categoria'];
      $id_manga = $_POST['id_manga'];

      if (!empty($id_manga)) {
        $this->model->editarManga($id_manga, $nombre, $autor, $descripcion, $categoria, $rutaTempImagenes);
      } else {
        $this->model->guardarManga($nombre, $autor, $descripcion, $categoria, $rutaTempImagenes);
      }
      
      echo json_encode(['message' => 'El Manga se guardo exitosamente.']);
    } else {
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

  public function delete($params)
  {
    if (UsuarioModel::isLoggedIn()) {
      $id_manga = $params[0];
      $this->model->borrarManga($id_manga);
      echo json_encode(['message' => 'La operación se completo con exito.']);
    } else {
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

  public function deleteImagen($params)
  {
    if (UsuarioModel::isLoggedIn()) {
      $id_imagen = $params[0];
      if ($id_imagen){
          $this->i_model->deleteImagen($id_imagen);
          echo json_encode(['message' => 'La imagen se borro exitosamente.']);      
        } else {
          echo json_encode(['error' => 'No se encontro la imagen con ID: ' . $id_imagen]);
        }
    } else {
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }
}