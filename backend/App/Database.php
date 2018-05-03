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

  public function parsing($query) {
    $items = array();
    foreach ($query as $row) {
      $item = array();
      foreach ($row as $key => $value) {
        // check if key is not a password and number
        if (!is_numeric($key) && !is_numeric('password')) {
          $item[$key] = $value ?: '';
        }
      }

      array_push($items, $item);
    }
    
    return $items;
  }

  public function withFirst($query) {
    $item = $query->fetchAll();

    return $item[0][0];
  }

  public function findAll($table = '') {
    // draft
    $query = $this->db->prepare('select * from ' . $table);
    
    return $query;
  }
}