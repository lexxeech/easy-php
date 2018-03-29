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
      $token = Authentication::parseHeader();
      $isAllowed = $this->auth->adminValidate($token);

      if (!$isAllowed) {
        throw new Exception(serialize([ 'detail' => "Permission denied" ]));
      }

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
        'errors' => unserialize($errors->getMessage()),
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

      $query = $this->db->rawQuery(Post::DELETE, [$_POST['post_id']]);
      
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
