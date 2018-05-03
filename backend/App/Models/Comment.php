<?php
namespace App\Models;

class Comment extends \Core\Model {
  const TABLE = 'comments';

  const UPDATE = '
    UPDATE comments
    SET comment = ?
    WHERE comment_id = ? and user_id = ?
  ';

  const CREATE = '
    INSERT INTO comments (post_id, user_id, comment)
    VALUES (?, ?, ?)
  ';
}
