<?php

class Model
{

  const DB_USER = 'root';
  const DB_PASS = '';

  protected $db;
  
  function __construct()
  {
    try {
      $this->db = new PDO('mysql:host=localhost;dbname=dimensionmanga;charset=utf8', self::DB_USER, self::DB_PASS);
    } catch (PDOException $e) {
      $this->install();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  function install() {
    try {
      $this->db = new PDO('mysql:host=localhost', self::DB_USER, self::DB_PASS);
      $this->db->exec('CREATE DATABASE IF NOT EXISTS dimensionmanga');
      $this->db->exec('USE dimensionmanga');
      $sql = file_get_contents('./install/dimensionmanga.sql');
      $this->db->exec($sql);
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }
}
 ?>
