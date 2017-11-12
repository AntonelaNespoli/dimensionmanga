<?php
class ImagenesModel extends Model
{
    function getImagenes($id_manga){
        $sentencia = $this->db->prepare( "select * from imagen where imagen.fk_id_manga = ?");
        $sentencia->execute([$id_manga]);
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    function deleteImagen($id_imagen){
        $sentencia = $this->db->prepare( "DELETE FROM imagen WHERE id_imagen = ?");
        $sentencia->execute([$id_imagen]);
    }
}

?>