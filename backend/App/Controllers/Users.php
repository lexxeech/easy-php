<?php
namespace App\Controllers;
use Exception;
use App\Database;
use App\Models\User;
use App\Models\Authentication;

class Users extends \Core\Controller {
  function __construct() {
    $this->db = new Database();
    $this->auth = new Authentication();
  }

  /**
   * @api {get} /users/get Get all users
   * @apiName Users
   * @apiGroup Users
   * @apiHeader {String} token Access token
   * @apiSampleRequest /users/get
   */
  public function getAction() {
    try {
      $token = Authentication::parseHeader();
      $isAllowed = $this->auth->adminValidate($token);

      if (!$isAllowed) {
        throw new Exception(serialize([ 'detail' => "Permission denied" ]));
      }

      $query = $this->db->rawQuery(User::GET);
      $items = $this->db->parsing($query);

      http_response_code(200);
      echo json_encode([
        'status' => 'OK',
        'items' => $items,
        'c' => $token
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
   * @api {get} /users/get-by Get user
   * @apiName User
   * @apiGroup Users
   * @apiHeader {String} token Access token
   * @apiSampleRequest /users/get-by
   */
  public function getByAction() {
    try {
      $errors = [];
      if ($_POST['post_id'] == '') $errors['role_id'] = 'This field is required!';

      if (sizeof($errors)) {
        throw new Exception(serialize($errors));
      }

      $token = Authentication::parseHeader();
      $isAllowed = $this->auth->adminValidate($token);

      if (!$isAllowed) {
        throw new Exception(serialize([ 'detail' => "Permission denied" ]));
      }

      $query = $this->db->rawQuery(User::GET_BY, [$_POST['post_id']]);
      $item = $this->db->parsing($query);

      http_response_code(200);
      echo json_encode([
        'status' => 'OK',
        'item' => $item
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
   * @api {post} /users/delete Delete user
   * @apiName Delete user
   * @apiGroup Users
   * @apiParam {Number} user_id User id.
   * @apiHeader {String} token Access token
   * @apiSampleRequest /users/delete
   */
  public function deleteAction() {
    try {
      $token = Authentication::parseHeader();
      $isAllowed = $this->auth->adminValidate($token);

      if (!$isAllowed) {
        throw new Exception(serialize([ 'detail' => "Permission denied" ]));
      }

      $query = $this->db->rawQuery(User::DELETE, [$_POST['user_id']]);

      http_response_code(200);
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
   * @api {post} /users/create Create user
   * @apiName Create user
   * @apiGroup Users
   * @apiHeader {String} token Access token
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
      
      $token = Authentication::parseHeader();
      $isAllowed = $this->auth->adminValidate($token);

      if (!$isAllowed) {
        throw new Exception(serialize([ 'detail' => "Permission denied" ]));
      }

      $query = $this->db->rawQuery(User::CREATE, [
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
   * @apiHeader {String} token Access token
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
      
      $token = Authentication::parseHeader();
      $isAllowed = $this->auth->adminValidate($token);

      if (!$isAllowed) {
        throw new Exception(serialize([ 'detail' => "Permission denied" ]));
      }

      $query = $this->db->rawQuery(User::UPDATE, [
        $_POST['role_id'], $_POST['name'], $_POST['email'], $_POST['password'], $_POST['user_id'], 
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
}