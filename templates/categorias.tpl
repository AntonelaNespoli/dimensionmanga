<div class="container">
        <div class="row">
                <div class="col">
                {foreach from=$categorias item=categoria}
                    {/
                    \{if $isLoggedIn}
                    <button type="button" class="btn btn-default btn-categorias" onclick="navigatePost('http://localhost/dimensionmanga/contenidoCategoria', {ldelim}id_categoria:{$categoria['id_categoria']}{rdelim})">
                         <a href="eliminarManga/{$manga['id_manga']}" target="_self"><i class="fa fa-trash fa-2x fa-fw"></i></a>
                        {$categoria['nombre']}
                    </button>              
                    \{else}
                         <button type="button" class="btn btn-default btn-categorias" onclick="navigatePost('http://localhost/dimensionmanga/contenidoCategoria', {ldelim}id_categoria:{$categoria['id_categoria']}{rdelim})">{$categoria['nombre']}</button>
                    \{/if}
                    }
                {/foreach}
                </div>
        </div>
    </div>