<?php

require_once('../model/ComentariosModel.php');
require_once('Api.php');

class ComentariosApiController extends Api
{
  protected $model;

  function __construct()
  {
      parent::__construct();
      $this->model = new ComentariosModel();
  }

  public function getComments($url_param = [])
  {
    $id_manga = $url_params[":id_manga"];
    $comentarios = $this->model->getComments($id_manga);
    if($cometarios){
        return $this->json_response($comentarios, 200);
    }else{
        return $this->json_response(false, 404);
    }
  }

  public function deleteComments($url_params = [])
  {
      $id = $url_params[":id"];
      $comentario = $this->model->getComment($id);
      if($comentario)
      {
        $this->model->deleteComment($id);
        return $this->json_response("Borrado exitoso.", 200);
      }
      else
        return $this->json_response(false, 404);
  }

  public function createComments($url_params = []) {
    $body = json_decode($this->raw_data);
    $user = $body->user;
    $texto = $body->comentario;
    $puntaje = $body->puntaje;
    $id_manga = $body->id_manga;
    $comentario = $this->model->postComment($user, $texto, $puntaje, $id_manga);
    $response = new stdClass();
    $response->tareas = [$tarea];
    $response->status = 200;
    return $this->json_response($response, 200);
  }

}

 ?>
