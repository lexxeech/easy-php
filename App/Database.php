<?php
namespace App;
use App\Config;
use Core\Model;
use PDO;


class Database {
  private $db = null;

  function __construct() {
    if ($this->db === null) {
      $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
      $this->db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

      // Throw an Exception when an error occurs
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
  }

  public function rawQuery($rawQuery = '', $params = []) {
    $query = $this->db->prepare($rawQuery);
    $query->execute($params);
    
    return $query;
  }

  public function findAll($table = '') {
    // draft
    $query = $this->db->prepare('select * from ' . $table);
    
    return $query;
  }
}