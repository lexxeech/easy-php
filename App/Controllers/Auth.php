<?php
namespace App\Controllers;
use PDO;
use Exception;
use App\Models\Authentication;

class Auth extends \Core\Controller {
  function __construct() {
    $this->db = new PDO('mysql:host=localhost;dbname=php-crud', 'root',
    '');
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

      // we should find user
      $query = $this->db->query('
        SELECT 
        user_id 
        FROM users
      ');

      echo json_encode([
        'status' => 'OK',
      ]);
    } catch (Exception $errors) {
      http_response_code(500);
      echo json_encode([
        'status' => 'ERROR',
        'errors' => unserialize($errors->getMessage()),
        'token' => Authentication::generateToken(),
      ]);  
    }
  }
}