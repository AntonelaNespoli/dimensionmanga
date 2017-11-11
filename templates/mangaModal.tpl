   <section class="media" id="box1">
        <figure class="media-left portada-emergente">
            <img class="media-object" src="{$manga['imagenes'][0]['ruta']}"alt="...">
        </figure>
        <div class="media-body texto-detalle" >
            {if $isLoggedIn}
                <a href="eliminarManga/{$manga['id_manga']}" target="_self"><i class="fa fa-trash fa-2x fa-fw"></i></a>
            {/if}
            <h4 class="media-heading">{$manga['nombre']} - {$manga['autor']}</h4>
            <h5>{$manga['categoria']}</h5>
            <p>{$manga['descripcion']}</p>
        </div>
    </section>