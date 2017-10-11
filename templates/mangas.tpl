<article class="container cuerpo-index">
    <div class="row">
    <div class="col">
        {foreach from=$manga item=manga}
        <section class="col-xs-12 col-sm-4 col-md-3 col-lg-3 portada">
            <a href="#" onclick="openManga('#box1')"><img src="{$manga['imagen']}" />
                <div class="name">{$manga['titulo']}</div>
            </a>
        </section>
        {/foreach}
        </div>
    </div>
</article>