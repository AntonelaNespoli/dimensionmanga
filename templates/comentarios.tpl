<div class="row">
    <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
</div>
<div id="listaComentarios" class="row"> 
    {foreach from=$comentarios item=comentario}
    <div class="col-md-12" id="{$comentario['id_comentario']}">
        <h4>{$comentario['fk_id_usuario']} - Puntaje manga: {$comentario['puntaje']}</h4>
        <p>{$comentario['comentario']}</p>
        {if $isSuperUser}
            <a href="#" onclick="deleteComentario({$cometario['id_comentario']})"><i class="fa fa-trash fa-2x fa-fw" aria-hidden="true"></i></a>
        {/if}
    </div>
    {/foreach}
</div>
<div class="row">
    {if $isLoggedIn}
    <div class="col">
        <form class="formComentario" method="post" onsubmit="grabarComentario(this, event)">
            <input type="hidden" id="id_manga" name="id_manga" value="{$comentario['fk_id_manga']}">
            <input type="hidden" id="id_manga" name="id_manga" value="{$comentario['fk_id_usuario']}">
            <div class="form-group">
                <label for="comentario">Comentario: </label>
                <textarea name="comentario" id="comentario" rows="8" cols="50" required></textarea>
            </div>
            <div class="form-group">
                <label for="puntaje">Calificación: </label>
                <label for="puntaje1"><input type="radio" name="puntaje" id="puntaje1"> 1</label>
                <label for="puntaje2"><input type="radio" name="puntaje" id="puntaje2"> 2</label>
                <label for="puntaje3"><input type="radio" name="puntaje" id="puntaje3"> 3</label>
                <label for="puntaje4"><input type="radio" name="puntaje" id="puntaje4"> 4</label>
                <label for="puntaje5"><input type="radio" name="puntaje" id="puntaje5"> 5</label>
            </div>
            <button type="submit" class="btn btn-default">Enviar Comentario</button>
        </form>
    </div>
    {/if}
</div>