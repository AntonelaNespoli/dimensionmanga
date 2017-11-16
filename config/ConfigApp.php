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
        'editarCategoria' => 'CategoriaController#edit',
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
        'registro' => 'LoginController#registro',
        'logout' => 'LoginController#destroy',
        'verificarUsuario' => 'LoginController#verify',
        'crearUsuario' => 'LoginController#create',
        'eliminarUsuario' => 'LoginController#delete',
        'adminUsers' => 'LoginController#listaUsers',
        'permisoSuperUser' => 'LoginController#superUser',
        //Configuración para comentarios
        'mostrarComentarios'=> 'ComentariosController#getComments',
        'comentariosDELETE'=> 'ComentariosApiController#deleteComments',
        'comentariosPOST'=> 'ComentariosApiController#createComments'
    ];

}

 ?>