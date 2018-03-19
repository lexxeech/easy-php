<?php
namespace App\Controllers;
use Exception;
use App\Database;
use App\Models\Authentication;
use App\Models\User;

class Auth extends \Core\Controller {
  function __construct() {
    $this->db = new Database();
  }

    /**
   * @api {post} /auth/get Sign in
   * @apiName Authentication
   * @apiGroup Authentication
   * @apiParam {String} email Email.
   * @apiParam {String} password Password.
   * @apiSampleRequest /auth/get
   */
  public function getAction() {
    try {
      $errors = [];
      if ($_POST['email'] == '') $errors['email'] = 'This field is required!';
      if ($_POST['password'] == '') $errors['password'] = 'This field is required!';

      if (sizeof($errors)) {
        throw new Exception(serialize($errors));
      }

      $token = Authentication::generateToken();
      $user = $this->db->rawQuery(User::CHECK_BY_EMAIL, [$_POST['email']]);
      $user = $this->db->withFirst($user);

      $query = $this->db->rawQuery(Authentication::ADD_TOKEN, [$token, $_POST['email']]);

      echo json_encode([
        'status' => 'OK',
        'token' => $token,
        'exists' => $user,
      ]);
    } catch (Exception $errors) {
      http_response_code(500);
      echo json_encode([
        'status' => 'ERROR',
        'errors' => $errors->getMessage(),
      ]);  
    }
  }
}