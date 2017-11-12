<div class="row">
  <div class="col-md-6 col-md-offset-3" id="mensajeCategoria">
  </div>
  <div class="col-md-6 col-md-offset-3">
    <form method="post" onsubmit="guardarCategoria(this, event)">
      <div class="form-group">
        <label for="nombre">Nombre de la categoría:</label>
        <input type="text" class="form-control" id="nombre" name="nombre"  value="{$nombre}" placeholder="Categoria" required>
      </div>
      <button type="submit" class="btn btn-default">Crear</button>
    </form>
  </div>
</div>