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

  /*public function store()
  {
    $nombre = $_POST['nombre'];
    $autor = $_POST['autor'];
    $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];
    $id_categoria =  $_POST['id_categoria'];
    if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
      if($this->tienePalabrasProhibidas($nombre)){
        $this->view->errorCrear("El 'titulo' tiene palabras prohibidas", $titulo, $autor, $imagen, $descripcion, $id_categoria);
      }
    }else{
        $this->view->errorCrear("El campo 'título' es requerido", $titulo, $autor, $imagen, $descripcion, $id_categoria);
    }
    if(isset($_POST['autor']) && !empty($_POST['autor'])){
        if($this->tienePalabrasProhibidas($autor)){
          $this->view->errorCrear("El autor tiene palabras prohibidas", $titulo, $autor, $imagen, $descripcion, $id_categoria);
        }
    }else{
        $this->view->errorCrear("El campo 'autor' es requerido", $titulo, $autor, $imagen, $descripcion, $id_categoria);
    }
    if(isset($_POST['descripcion']) && !empty($_POST['descripcion'])){
        if($this->tienePalabrasProhibidas($descripcion)){
          $this->view->errorCrear("La descripción tiene palabras prohibidas", $titulo, $autor, $imagen, $descripcion, $id_categoria);
        }
    }else{
        $this->view->errorCrear("El campo 'descripción es requerido", $titulo, $autor, $imagen, $descripcion, $id_categoria);
    }

    }else{
      $this->model->guardarTarea($titulo, $descripcion, $completada);
      header('Location: '.HOME);
    }
    }
    }
  }*/

  public function destroy($params)
  {
    $id_tarea = $params[0];
    $this->model->borrarTarea($id_tarea);
    header('Location: '.HOME);
  }
}