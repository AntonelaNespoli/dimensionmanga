<div class="row">
  <div class="col-md-8 col-md-offset-2" id ="mensajeForm">
  </div>
  <div class="col-md-6 col-md-offset-3">
    <form class="formManga" method="post" enctype="multipart/form-data" onsubmit="grabarManga(this, event)">
      <input type="hidden" id="id_manga" name="id_manga" value="{$manga['id_manga']}">
      <div class="form-group">
        <label for="nombre">Nombre Manga:</label>
        <input type="text" class="form-control" id="nombre" name="nombre"  value="{$manga['nombre']}" placeholder="Nombre del Manga" required>
      </div>
      <div class="form-group">
          <label for="autor">Autor Manga:</label>
          <input type="text" class="form-control" id="autor" name="autor"  value="{$manga['autor']}" placeholder="Autor del Manga"  required>
        </div>
        <div class="form-group">
          <label for="imagen">Imagen Manga:</label>
          <input type=file id="imagen" name="imagenes[]" accept="image/*" placeholder="url de la imagen" multiple {if !$manga['id_manga']}required{/if}>
        </div>
      <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id="descripcion" name="descripcion" rows="8" cols="50" required>{$manga['descripcion']}</textarea>
      </div>
      <div class="form-group">
          <select name='categoria'>
              {foreach from=$categorias item=categoria}
                  <option value="{$categoria['id_categoria']}" {if $categoria['id_categoria'] == $manga['id_categoria']}selected {/if}>{$categoria['nombre']}</option>
              {/foreach}
          </select>
      </div>
      <button type="submit" class="btn btn-default">Crear</button>
    </form>
  </div>
  <div class="col-md-8 col-md-offset-3">
  {if $manga['id_manga']}
      {foreach from=$imagenes item=imagen} 
        <section id="{$imagen['id_imagen']}" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 portada">
          <img src="{$imagen['ruta']}"/>
          <a href="#" onclick="deleteImagen({$imagen['id_imagen']})">
            <i class="fa fa-trash fa-2x fa-fw" aria-hidden="true"></i>
          </a>
        </section>
      {/foreach}
  {/if}
  </div>
</div>