<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
        ''=> 'IndexController#index',
        'listaCategorias' => 'CategoriaController#index',
        'listaMangas' => 'MangaController#index',
        'login' => 'LoginController#index',
        'logout' => 'LoginController#destroy',
        'descripcionManga' => 'MangaController#descripcion',
        'contenidoCategoria' => 'CategoriaController#mangasPorCategoria'
    ];

}

 ?>