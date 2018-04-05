<?php
namespace App\Models;
use PDO;

class Post extends \Core\Model {
  const TABLE = 'posts';
  
  const GET = '
    SELECT
    posts.post_id,
    posts.img,
    posts.title,
    posts.body,
    posts.user_id,
    users.name,
    users.email
    FROM posts
    LEFT JOIN users
    ON posts.user_id = users.user_id
  ';
  
  const GET_BY = '
    SELECT
    posts.post_id,
    posts.img,
    posts.title,
    posts.body,
    posts.user_id,
    users.name,
    users.email
    FROM posts
    LEFT JOIN users
    ON posts.user_id = users.user_id
    WHERE posts.post_id = ?
  ';

  const DELETE = '
    DELETE FROM
    posts
    WHERE post_id = ?
  ';
}