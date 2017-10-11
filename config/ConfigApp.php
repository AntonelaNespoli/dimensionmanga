<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
        ''=> 'IndexController#index',
        'listaCategorias' => 'categorias',
        'listaMangas' => 'mangas',
        'login' => 'LoginController#index',
        'logout' => 'LoginController#destroy'
    ];

}

 ?>