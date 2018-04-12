<?php
namespace App\Controllers;
use Exception;
use \Core\View;
use App\Database;
use App\Models\Post;
use App\Models\Authentication;

class Posts extends \Core\Controller {
  function __construct() {
    $this->db = new Database();
    $this->auth = new Authentication();
  }
  
  /**
   * @api {get} /posts/get Get all posts
   * @apiName Posts get
   * @apiGroup Posts
   * @apiHeader {String} token Access token
   * @apiSampleRequest /posts/get
   */
  public function getAction() {
    try {
      $query = $this->db->rawQuery(Post::GET);
      $items = $this->db->parsing($query);
      
      http_response_code(200);
      echo json_encode([
        'status' => 'OK',
        'items' => $items,
      ]);
    } catch (Exception $errors) {
      http_response_code(500);
      echo json_encode([
        'status' => 'ERROR',
        // 'errors' => unserialize($errors->getMessage()),
        'errors' => $errors->getMessage(),
      ]);
    }
  }

  /**
   * @api {post} /posts/get-by Get post
   * @apiName Post get
   * @apiGroup Posts
   * @apiHeader {String} token Access token
   * @apiParam {Number} post_id Post id.
   * @apiSampleRequest /posts/get-by
   */
  public function getByAction() {
    try {
      $query = $this->db->rawQuery(Post::GET_BY, [$_POST['post_id']]);
      $item = $this->db->parsing($query);

      $query = $this->db->rawQuery(Post::GET_COMMENTS, [$_POST['post_id']]);
      $comments = $this->db->parsing($query);
      
      http_response_code(200);
      echo json_encode([
        'status' => 'OK',
        'item' => $item,
        'comments' => $comments,
      ]);
    } catch (Exception $errors) {
      http_response_code(500);
      echo json_encode([
        'status' => 'ERROR',
        // 'errors' => unserialize($errors->getMessage()),
        'errors' => $errors->getMessage(),
        
      ]);
    }
  }

  /**
   * @api {post} /posts/delete Delete post
   * @apiName Post delete
   * @apiGroup Posts
   * @apiHeader {String} token Access token
   * @apiParam {Number} post_id Post id.
   * @apiSampleRequest /posts/delete
   */
  public function deleteAction() {
    try {
      $token = Authentication::parseHeader();
      $isAllowed = $this->auth->adminValidate($token);

      if (!$isAllowed) {
        throw new Exception(serialize([ 'detail' => "Permission denied" ]));
      }

      $this->db->rawQuery(Post::DELETE, [$_POST['post_id']]);
      
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
   * @api {post} /posts/update Update post
   * @apiName Post update
   * @apiGroup Posts
   * @apiHeader {String} token Access token
   * @apiParam {Number} post_id Post id.
   * @apiParam {Number} img Image
   * @apiParam {Number} title Title
   * @apiParam {Number} body Body
   * @apiSampleRequest /posts/update
   */
  public function updateAction() {
    try {
      $errors = [];
      if ($_POST['post_id'] == '') $errors['post_id'] = 'This field is required!';
      if ($_POST['img'] == '') $errors['img'] = 'This field is required!';
      if ($_POST['title'] == '') $errors['title'] = 'This field is required!';
      if ($_POST['body'] == '') $errors['body'] = 'This field is required!';

      if (sizeof($errors)) {
        throw new Exception(serialize($errors));
      }

      $token = Authentication::parseHeader();
      $isAllowed = $this->auth->adminValidate($token);

      if (!$isAllowed) {
        throw new Exception(serialize([ 'detail' => "Permission denied" ]));
      }

      $this->db->rawQuery(Post::UPDATE, [$_POST['img'], $_POST['title'], $_POST['body'], $_POST['post_id']]);      

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
   * @api {post} /posts/create Create post
   * @apiName Post create
   * @apiGroup Posts
   * @apiHeader {String} token Access token
   * @apiParam {Number} img Image
   * @apiParam {Number} title Title
   * @apiParam {Number} body Body
   * @apiSampleRequest /posts/create
   */
  public function createAction() {
    try {
      $errors = [];
      if ($_POST['img'] == '') $errors['img'] = 'This field is required!';
      if ($_POST['title'] == '') $errors['title'] = 'This field is required!';
      if ($_POST['body'] == '') $errors['body'] = 'This field is required!';

      if (sizeof($errors)) {
        throw new Exception(serialize($errors));
      }

      $token = Authentication::parseHeader();
      $userId = $this->auth->adminValidate($token, true);

      if (!$userId) {
        throw new Exception(serialize([ 'detail' => "Permission denied" ]));
      }

      $this->db->rawQuery(Post::CREATE, [$userId, $_POST['img'], $_POST['title'], $_POST['body']]);      

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
