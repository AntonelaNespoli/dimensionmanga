<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4" id="mensajeLogin">
    </div>
    <div class="col-md-4 col-md-offset-4">
      <form class="login" method="post">
        <div class="form-group" >
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="mail" required>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="clave" required>
        </div>
        <button type="button" onclick="login()" class="btn btn-categorias">Sing in</button>
      </form>
    </div>
  </div>
</div>