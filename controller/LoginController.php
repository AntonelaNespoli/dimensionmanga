<?php
include_once('model/UsuarioModel.php');
include_once('view/LoginView.php');

class LoginController extends Controller
{

  function __construct()
  {
    $this->view = new LoginView();
    $this->model = new UsuarioModel();
  }

  public function index()
  {
    $this->view->mostrarLogin();
  }
  
  public function registro(){
    $this->view->mostrarRegistro();
  }

  public function verify($userMail = '', $password = '')
  {
    if (empty($userMail)&&(empty($password))){
      $userMail = $_POST['mail'];
      $password = $_POST['clave'];
    }

      if(!empty($userMail) && !empty($password)){
        $user = $this->model->getUser($userMail);

        if((!empty($user)) && password_verify($password, $user['clave'])) {
            session_start();
            $_SESSION['USER'] = $userMail;
            $_SESSION['LAST_ACTIVITY'] = time();
            echo json_encode(['url' => HOME]);
        } else {
            echo json_encode(['error' => 'Usuario o contraseña incorrectos']);
        }
      }
  }
  public function create()
  {
    $userName = $_POST['name'];
    $userMail = $_POST['mail'];
    $password = $_POST['clave'];
    $confirmPassword = $_POST['confirmarClave'];
    $hash = password_hash($password, PASSWORD_DEFAULT);  

    if ($password != $confirmPassword){
      echo json_encode(['error' => 'Las contraseñas no coinciden']);
    }else{
      if ($this->model->userExist($userMail)){
        echo json_encode(['error' => 'El mail ya esta registrado']);
      }else{
        $this->model->recordUser($userName, $userMail, $hash);
        $this->verify($userMail, $password);
      }

    }
  }

  public function delete($params)
  {
    if (UsuarioModel::isLoggedIn()) {
      $id_user = $params[0];
      $this->model->borrarUser($id_user);
      echo json_encode(['message' => 'El usuario a sido eliminado exitosamente.']);
    } else {
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

  public function superUser(){

  }
  public function destroy()
  {
    session_start();
    session_destroy();
    header('Location: '.HOME);
  }

  public function listaUsers(){
    $users = $this->model->getUsers();
    $this->view->mostrarListaUsers($users);
  }
}

 ?>
