<?php
namespace App\Controllers;
use Exception;
use App\Database;
use App\Models\Authentication;
use App\Models\Comment;

class Comments extends \Core\Controller {
  function __construct() {
    $this->db = new Database();
    $this->auth = new Authentication();
  }

  /**
   * @api {post} /comments/create Create comment
   * @apiName Comments create
   * @apiGroup Comments
   * @apiHeader {String} token Access token
   * @apiParam {Number} post_id Post id.
   * @apiParam {String} comment Comment.
   * @apiSampleRequest /comments/create
   */
  public function createAction() {
    try {
      $errors = [];
      if ($_POST['comment'] == '') $errors['comment'] = 'This field is required!';
      if ($_POST['post_id'] == '') $errors['post_id'] = 'This field is required!';

      if (sizeof($errors)) {
        throw new Exception(serialize($errors));
      }

      $token = Authentication::parseHeader();
      $userId = $this->auth->validate($token, true);

      if (!$userId) {
        throw new Exception(serialize([ 'detail' => "Token isn't found" ]));
      }

      $this->db->rawQuery(Comment::CREATE, [$_POST['post_id'], $userId, $_POST['comment']]);      
      
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
   * @api {post} /comments/update Update comments
   * @apiName Comments update
   * @apiGroup Comments
   * @apiHeader {String} token Access token
   * @apiParam {Number} comment_id Comment id.
   * @apiParam {String} comment Comment.
   * @apiSampleRequest /comments/update
   */
  public function updateAction() {
    try {
      $errors = [];
      if ($_POST['comment'] == '') $errors['comment'] = 'This field is required!';
      if ($_POST['comment_id'] == '') $errors['comment_id'] = 'This field is required!';

      if (sizeof($errors)) {
        throw new Exception(serialize($errors));
      }

      $token = Authentication::parseHeader();
      $userId = $this->auth->validate($token, true);

      if (!$userId) {
        throw new Exception(serialize([ 'detail' => "Token isn't found" ]));
      }

      $this->db->rawQuery(Comment::UPDATE, [$_POST['comment'], $_POST['comment_id'], $userId]);      
      
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
}