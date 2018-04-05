<?php
namespace App\Models;
use App\Models\User;
use App\Database;

class Authentication extends \Core\Model {
  function __construct() {
    $this->db = new Database();
  }

  const ADD_TOKEN = '
  UPDATE users
  SET token = ?
  WHERE email = ?
';

  const DELETE_TOKEN = '
    UPDATE users
    SET token = \'\'
    WHERE token = ?
  ';
  
  public static function generateToken() {
    return md5(uniqid(mt_rand(), true));
  }

  public function validate($token) {
    if (!$token) {
      return false;
    }

    $user = $this->db->rawQuery(User::CHECK_BY_TOKEN, [$token]);
    $user = $this->db->withFirst($user);

    return $user ? true : false;
  }

  public function adminValidate($token) {
    if (!$token) {
      return false;
    }
    
    $user = $this->db->rawQuery(User::CHECK_BY_ADMIN_TOKEN, [$token]);
    $user = $this->db->withFirst($user);

    return $user ? true : false;
  }

  public static function parseHeader() {
    $token = '';
    foreach (getallheaders() as $key => $value) {
      if ($key == 'token') {
        $token = $value;
      }
    }

    return $token || '';
  }
}