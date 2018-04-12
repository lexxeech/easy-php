<?php
namespace App\Controllers;
use Exception;
use App\Database;
use App\Models\User;
use App\Models\Authentication;

class Comments extends \Core\Controller {
  function __construct() {
    $this->db = new Database();
    $this->auth = new Authentication();
  }

  /**
   * @api {post} /comments/update Update comments
   * @apiName Comments update
   * @apiGroup Comments
   * @apiHeader {String} token Access token
   * @apiParam {Number} post_id Post id.
   * @apiSampleRequest /comments/update
   */
  public function updateAction() {
  }

  /**
   * @api {post} /comments/create Create comment
   * @apiName Comments create
   * @apiGroup Comments
   * @apiHeader {String} token Access token
   * @apiParam {Number} comment Comment
   * @apiSampleRequest /comments/create
   */
  public function createAction() {
  }
}