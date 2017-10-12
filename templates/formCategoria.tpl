<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {if isset($error) }
      <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    <form action="guardarCategoria" method="post">
      <div class="form-group">
        <label for="nombre">Nombre de la categoría:</label>
        <input type="text" class="form-control" id="nombre" name="nombre"  value="{$nombre}" placeholder="Categoria">
      </div>
      <button type="submit" class="btn btn-default">Crear</button>
    </form>
  </div>
</div>