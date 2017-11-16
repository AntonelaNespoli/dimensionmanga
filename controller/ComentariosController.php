<?php

include_once('model/ComentariosModel.php');
include_once('view/ComentariosView.php');
include_once('model/UsuarioModel.php');

class ComentariosController extends Controller
{
  protected $model;

  function __construct()
  {
      $this->model = new ComentariosModel();
      $this->view =new ComentariosView();
      $this->u_model =new UsuarioModel();
  }

  public function getComments($params)
  {
    $id_manga = $params[0];
    $comentarios = $this->model->getComments($id_manga);
    $usuarios = $this->u_model->getUsers();
    if($comentarios){
      $this->view->mostrarComentarios($comentarios, $usuarios);
    }else{
        echo json_encode(['error' => 'No se encontraron comentarios.']);
    }
  }

  public function deleteComment($id)
  {
    $comentario = $this->model->getComment($id);
    if($comentario){
      $this->model->deleteComment($id);
      echo json_encode(['manssega' => 'El comentario se elimino correctamente.']);
    } else{
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
  }
}

  public function createComment() {
    if (UsuarioModel::isLoggedIn()) {

      $comentario = $_POST['comentario'];
      $puntaje = $_POST['puntaje'];
      $id_manga = $POST['id_manga'];
      $id_usuario = $POST['id_usuario'];

      $this->model->createComment($comentario, $puntaje, $id_manga, $id_usuario);
      
        echo json_encode(['message' => 'El comentario se creo exitosamente.']);

    } else {
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

}

 ?>
