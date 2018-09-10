<?php
class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
        'comentarios#GET'=> 'ComentariosApiController#getComments',
        'comentario#DELETE'=> 'ComentariosApiController#deleteComment',
        'comentario#POST'=> 'ComentariosApiController#createComment'
    ];
}

?>
