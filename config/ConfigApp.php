<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
        ''=> 'IndexController#index',
        //Configuración para url's items
        'listaCategorias' => 'CategoriaController#index',
        'contenidoCategoria' => 'CategoriaController#mangasPorCategoria',
        'crearCategoria'=> 'CategoriaController#create',
        'guardarCategoria' => 'CategoriaController#store',
        'eliminarCategoria' => 'CategoriaController#delete',
        //Configuración para url's categorias
        'listaMangas' => 'MangaController#index',
        'descripcionManga' => 'MangaController#descripcion',
        'crearManga'=> 'MangaController#create',
        'guardarManga' => 'MangaController#store',
        'eliminarManga' => 'MangaController#delete',
        'eliminarImagen' => 'MangaController#deleteImagen',
        'editarManga' => 'MangaController#edit',
        //Configuración para url's login, logout y verificaciones
        'login' => 'LoginController#index',
        'logout' => 'LoginController#destroy',
        'verificarUsuario' => 'LoginController#verify' 
    ];

}

 ?>