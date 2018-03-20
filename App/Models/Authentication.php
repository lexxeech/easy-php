<?php
namespace App\Models;
use App\Models\User;
use App\Database;

class Authentication extends \Core\Model {
  function __construct() {
    $this->db = new Database();
  }
  
  public static function generateToken() {
    return md5(uniqid(mt_rand(), true));
  }

  const ADD_TOKEN = '
    UPDATE users
    SET token = ?
    WHERE email = ?
  ';

  public function validate($user) {
    $user = $this->db->rawQuery(User::CHECK_BY_TOKEN, [$user]);
    $user = $this->db->withFirst($user);

    return $user ? true : false;
  }

  public function parseHeader() {
    $token = '';
    foreach (getallheaders() as $key => $value) {
      if ($key == 'token') {
        $token = $value;
      }
    }

    return $token;
  }
}