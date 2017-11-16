<?php

include_once('model/ComentariosModel.php');

class ComentariosController extends Controller
{
  protected $model;

  function __construct()
  {
      $this->model = new ComentariosModel();
  }

  public function getComments($id_manga)
  {
    $comentarios = $this->model->getComments($id_manga);
    if($cometarios){
        return $this->json_response($comentarios);
    }else{
        echo json_encode(['mensagge' => 'No se encontraron comentarios.']);
    }
  }

  public function deleteComments($id)
  {
      $comentario = $this->model->getComment($id);
      if($comentario)
      {
        $this->model->deleteComment($id);
        return $this->json_response('Se elimino correctamente');
      }
      else
        return $this->json_response(false, 404);
  }

  public function createComments($url_params = []) {
    $body = json_decode($this->raw_data);
    $user = $body->user;
    $comentario = $body->comentario;
    $puntaje = $body->puntaje;
    $id_manga = $body->id_manga;
    $post = $this->model->postComment($user, $texto, $puntaje, $id_manga);

    return $this->json_response("El comentario se creo exitosamente.", 200);
  }

}

 ?>
