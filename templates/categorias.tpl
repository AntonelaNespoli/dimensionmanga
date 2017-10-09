<div class="container">
        <div class="row">
                <div class="col">
                {foreach from=$categoria item=categoria}
                    <button type="button" class="btn btn-default btn-categorias">{$categoria['nombre']}</button>
                {/foreach}
                </div>
        </div>
    </div>