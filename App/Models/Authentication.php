<?php
namespace App\Models;
use PDO;

class Authentication extends \Core\Model {
  public static function generateToken() {
    return md5(uniqid(mt_rand(), true));
  }
}