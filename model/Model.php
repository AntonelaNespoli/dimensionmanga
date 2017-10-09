<?php

class Model
{
  protected $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;'
    .'dbname=divisionmanga;charset=utf8'
    , 'root', '');
  }
}
 ?>
