   <div class="row">
        <div class="col-sm-6">
            <div id="manga-carousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    {foreach $manga['imagenes'] as $k => $i}
                    <li data-target="#manga-carousel" data-slide-to="{$k}" {if $k == 0}class="active"{/if}></li>
                    {/foreach}
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    {foreach $manga['imagenes'] as $key => $item}
                    <div class="item {if $key == 0}active{/if}">
                        <img src="{$item['ruta']}">
                    </div>
                    {/foreach}
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#manga-carousel" role="button" data-slide="prev">
                    <i class="fa fa-angle-left fa-2x"></i>
                </a>
                <a class="right carousel-control" href="#manga-carousel" role="button" data-slide="next">
                    <i class="fa fa-angle-right fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="col-sm-6" >
            {if $isLoggedIn}
                <a href="eliminarManga/{$manga['id_manga']}" target="_self"><i class="fa fa-trash fa-2x fa-fw"></i></a>
            {/if}
            <h4 class="media-heading">{$manga['nombre']} - {$manga['autor']}</h4>
            <h5>{$manga['categoria']}</h5>
            <p>{$manga['descripcion']}</p>
        </div>
    </div>