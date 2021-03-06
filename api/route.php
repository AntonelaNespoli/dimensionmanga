<?php
define('RESOURCE', 0);
define('PARAMS', 1);
include_once 'config/Router.php';
include_once '../model/Model.php';
include_once '../model/ComentariosModel.php';
include_once '../controller/Controller.php';
include_once 'controller/ComentariosApiController.php';
include_once '../view/View';
include_once '../view/ComentariosView';

$router = new Router();
//url, verb, controller, method
$router->AddRoute("comentarios/:id_manga", "GET", "ComentariosApiController", "getComentarios");
$router->AddRoute("comentarios", "POST", "ComentariosApiController", "postComentarios");
$router->AddRoute("comentarios/:id", "DELETE", "ComentariosApiController", "deleteComentarios");
$route = $_GET['resource'];
$array = $router->Route($route);
if(sizeof($array) == 0)
  echo "404";
else
{
  $controller = $array[0];
  $metodo = $array[1];
  $url_params = $array[2];
  echo (new $controller())->$metodo($url_params);
}
?>