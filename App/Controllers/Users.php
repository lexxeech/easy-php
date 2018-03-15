<?php
namespace App\Controllers;
use PDO;
use Exception;

class Users extends \Core\Controller {
  function __construct() {
    $this->db = new PDO('mysql:host=localhost;dbname=php-crud', 'root',
    '');
  }

  /**
   * @api {get} /users/get Get all users
   * @apiName Users
   * @apiGroup Users
   * @apiSampleRequest /users/get
   */
  public function getAction() {
    try {
      $query = $this->db->query('
        SELECT 
        users.user_id, 
        users.email, 
        users.name, 
        roles.name AS role_name 
        FROM users 
        LEFT JOIN roles 
        ON users.role_id = roles.role_id
      ');

      $items = array();
      foreach ($query as $row) {
        array_push($items, [
          "user_id" => $row['user_id'],
          "name" => $row['name'],
          "email" => $row['email'],
          "role" => $row['role_name'],
        ]);
      }

      http_response_code(200);
      echo json_encode([
        'status' => 'OK',
        'items' => $items,
      ]);
    } catch (Errors $errors) {
      http_response_code(500);
      echo json_encode([
        'status' => 'ERROR',
        'errors' => $errors,
      ]);
    }
  }

  /**
   * @api {post} /users/delete Delete user
   * @apiName Delete user
   * @apiGroup Users
   * @apiParam {Number} user_id User id.
   * @apiSampleRequest /users/delete
   */
  public function deleteAction() {
    try {
      $query = $this->db->prepare('
        DELETE FROM  
        users
        WHERE user_id = ?
      ');
      $query->execute(array($_POST['user_id']));

      http_response_code(200);
      echo json_encode([
        'status' => 'OK',
      ]);
    } catch (Errors $errors) {
      http_response_code(500);
      echo json_encode([
        'status' => 'ERROR',
        'errors' => $errors,
      ]);
    }
  }

  /**
   * @api {post} /users/create Create user
   * @apiName Create user
   * @apiGroup Users
   * @apiParam {Number} role_id Role id.
   * @apiParam {String} name Name
   * @apiParam {String} email Email
   * @apiParam {String} password Password
   * @apiSampleRequest /users/create
   */
  public function createAction() {
    try {
      $errors = [];
      if ($_POST['role_id'] == '') $errors['role_id'] = 'This field is required!';
      if ($_POST['name'] == '') $errors['name'] = 'This field is required!';
      if ($_POST['email'] == '') $errors['email'] = 'This field is required!';
      if ($_POST['password'] == '') $errors['password'] = 'This field is required!';

      if (sizeof($errors)) {
        throw new Exception(serialize($errors));
      }

      $query = $this->db->prepare('
        INSERT INTO users (role_id, name, email, password)
        VALUES (?, ?, ?, ?)
      ');
      $query->execute([
        $_POST['role_id'], $_POST['name'], $_POST['email'], $_POST['password'], 
      ]);

      echo json_encode([
        'status' => 'OK',
      ]);
    } catch (Exception $errors) {
      http_response_code(500);
      echo json_encode([
        'status' => 'ERROR',
        'errors' => unserialize($errors->getMessage()),
      ]);      
    }
  }

  /**
   * @api {post} /users/update Update user
   * @apiName Update user
   * @apiGroup Users
   * @apiParam {Number} user_id User id.
   * @apiParam {Number} role_id Role id.
   * @apiParam {String} name Name
   * @apiParam {String} email Email
   * @apiParam {String} password Password
   * @apiSampleRequest /users/update
   */
  public function updateAction() {
    try {
      $errors = [];
      if ($_POST['role_id'] == '') $errors['role_id'] = 'This field is required!';
      if ($_POST['name'] == '') $errors['name'] = 'This field is required!';
      if ($_POST['email'] == '') $errors['email'] = 'This field is required!';
      if ($_POST['password'] == '') $errors['password'] = 'This field is required!';

      if (sizeof($errors)) {
        throw new Exception(serialize($errors));
      }
      
      echo json_encode([
        'status' => 'OK',
      ]);
    } catch (Exception $errors) {
      http_response_code(500);
      echo json_encode([
        'status' => 'ERROR',
        'errors' => unserialize($errors->getMessage()),
      ]);      
    }
  }
}