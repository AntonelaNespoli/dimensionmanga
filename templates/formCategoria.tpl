<div class="row">
  <div class="col-md-6 col-md-offset-3" id="mensajeCategoria">
  </div>
  <div class="col-md-6 col-md-offset-3">
    <form method="post" onsubmit="guardarCategoria(this, event)">
      <input type="hidden" id="id_categoria" name="id_categoria" value="{$categoria['id_categoria']}">
      <div class="form-group">
        <label for="nombre">Nombre de la categoría:</label>
        <input type="text" class="form-control" id="nombre" name="nombre"  value="{$categoria['nombre']}" placeholder="Categoria" required>
      </div>
      <button type="submit" class="btn btn-default">Guardar categoría</button>
    </form>
  </div>
</div>