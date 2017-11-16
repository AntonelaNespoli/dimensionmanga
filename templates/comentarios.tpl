<div id="listaComentarios" class="row"> 
    <div class="col" id="{comentarios[id_comentario]}">
  <h4>{comentarios[fk_id_usuario]} - Puntaje manga: {{puntaje}}</h4>
  <p>{{comentario}}</p>
</div>

<lo id="comentarios{{id_comentario}}"class="list-group-item">
    {{titulo}}
  <a class="js-borrar" data-idtarea="{{id_comentario}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
  <a class="js-completada" data-idtarea="{{id_comentario}}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
</li>
{{/comentarios}}
</div>