<article class="container cuerpo-index">
    <div class="row">
    <div class="col">
        {foreach from=$mangas item=manga}
        <section class="col-xs-12 col-sm-4 col-md-3 col-lg-3 portada">
            <a href="#" onclick="mangaModal({$manga['id_manga']})"><img src="{$manga['imagen']}" />
                <div class="name">{$manga['nombre']}</div>
            </a>
        </section>
        {/foreach}
        </div>
    </div>
</article>