<div class="row">
    <div class="col-md-6 col-md-offset-3">
      {if isset($error) }
        <div class="alert alert-danger" role="alert">{$error}</div>
      {/if}
      <form action="guardarManga" method="post">
        <div class="form-group">
          <label for="nombre">Nombre Manga:</label>
          <input type="text" class="form-control" id="nombre" name="nombre"  value="{$nombre}" placeholder="Nombre del Manga" required>
        </div>
        <div class="form-group">
            <label for="nombre">Autor Manga:</label>
            <input type="text" class="form-control" id="autor" name="autor"  value="{$autor}" placeholder="Autor del Manga"  required>
          </div>
          <div class="form-group">
            <label for="nombre">Imagen Manga:</label>
            <input type="text" class="form-control" id="imagen" name="imagen"  value="{$imagen}" placeholder="url de la imagen" required>
          </div>
        <div class="form-group">
          <label for="descripcion">Descripcion</label>
          <textarea name="descripcion" id="descripcion" name="descripcion" rows="8" cols="50" required>{$descripcion}</textarea>
        </div>
        <div class="form-group">
            <select name='categoria'>
                {foreach from=$categorias item=categoria}
                    <option value="{$categoria['id_categoria']}">{$categoria['nombre']}</option>
                {/foreach}
            </select>
        </div>
        <button type="submit" class="btn btn-default">Crear</button>
      </form>
    </div>
  </div>