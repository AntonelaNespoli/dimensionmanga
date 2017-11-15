<?php
class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
      'comentarios#GET'=> 'ComentariosApiController#getComments',
      'comentarios#DELETE'=> 'ComentariosApiController#deleteComments',
      'comentarios#POST'=> 'ComentariosApiController#createComments'
    ];
}
?>