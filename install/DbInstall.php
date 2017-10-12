<?php

include_once 'model/Model.php';

class DbInstall extends Model
{
  function install(){
    try {
      $sql = file_get_contents('./install/dimensionmanga.sql');
      echo $qr = $this->db->exec($sql);
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }
}
?>