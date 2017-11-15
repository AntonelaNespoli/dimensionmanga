<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
        </div>
        <div class="row">
            <div class="col listaCategorias">
                {foreach from=$categorias item=categoria}
                    <button type="button" class="btn btn-default btn-categorias" onclick="navigatePost('http://localhost/dimensionmanga/contenidoCategoria', {ldelim}id_categoria:{$categoria['id_categoria']}{rdelim})">
                        {$categoria['nombre']}
                    </button>              
                {/foreach}
            </div>
        </div>
    </div>