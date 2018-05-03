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
  
  const GET_COMMENTS = '
    SELECT
    comments.comment_id,
    comments.post_id,
    comments.comment,
    users.user_id,
    users.name AS user
    FROM comments
    LEFT JOIN users
    ON comments.user_id = users.user_id
    WHERE comments.post_id = ?
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

  const UPDATE = '
    UPDATE posts
    SET img = ?, title = ?, body = ?
    WHERE post_id = ?
  ';

  const CREATE = '
    INSERT INTO posts (user_id, img, title, body)
    VALUES (?, ?, ?, ?)
  ';
}