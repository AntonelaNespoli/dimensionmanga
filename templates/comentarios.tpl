<div class="row">
    <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
</div>
<div id="listaComentarios" class="row"> 
</div>
<div class="row">
    {if $isLoggedIn}
    <div class="col">
        <form class="formComentario" method="post" onsubmit="grabarComentario(this, event)">
            <input type="hidden" id="id_manga" name="id_manga" value="{$comentario['fk_id_manga']}">
            <input type="hidden" id="id_manga" name="id_usuario" value="{$comentario['fk_id_usuario']}">
            <div class="form-group">
                <label for="comentario">Comentario: </label>
                <textarea name="comentario" id="comentario" rows="8" cols="50" required></textarea>
            </div>
            <div class="form-group">
                <label for="puntaje">Calificación: </label>
                <select name='puntaje'>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default">Enviar Comentario</button>
        </form>
    </div>
    {/if}
</div>