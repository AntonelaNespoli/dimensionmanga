<?php
include_once('model/UsuarioModel.php');
include_once('view/LoginView.php');

class LoginController extends Controller
{

  function __construct()
  {
    $this->view = new LoginView();
    $this->model = new LoginModel();
  }

  public function index()
  {
    $this->view->mostrarLogin();
  }

  public function verify()
  {
      $userMail = $_POST['mail'];
      $password = $_POST['contraseña'];

      if(!empty($userMail) && !empty($password)){
        $user = $this->model->getUser($userMail);
        if((!empty($user)) && password_verify($password, $user[0]['contraseña'])) {
            session_start();
            $_SESSION['USER'] = $userMail;
            $_SESSION['LAST_ACTIVITY'] = time();
            header('Location: '.HOME);
        }
        else{
            $this->view->mostrarLogin('Usuario o contraseña incorrectos');
        }
      }
  }

  public function destroy()
  {
    session_start();
    session_destroy();
    header('Location: '.LOGIN);
  }
}

 ?>
