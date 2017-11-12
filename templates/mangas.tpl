<article class="container cuerpo-index">
    <div class="row">
        <div class="col" id ="mensaje">
        </div>
        <div class="col">
            {foreach from=$mangas item=manga}
                <section id="{$manga['id_manga']}" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 portada">
                    <a href="#" onclick="mangaModal({$manga['id_manga']})">
                        <img src="{$manga['imagenes'][0]['ruta']}"/>
                        <div class="name">{$manga['nombre']}</div>
                    </a>
                    {if ($isLoggedIn)}
                    <a href="#" onclick="deleteManga({$manga['id_manga']})">
                        <i class="fa fa-trash fa-2x fa-fw" aria-hidden="true"></i>
                    </a>
                    <a href="#" onclick="editManga({$manga['id_manga']})">
                        <i class="fa fa-edit fa-2x fa-fw" aria-hidden="true"></i>
                    </a>
                    {/if}
                </section>
            {/foreach}
        </div>
    </div>
</article>