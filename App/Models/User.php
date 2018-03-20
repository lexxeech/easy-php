<?php
namespace App\Models;
use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model {

  public static function getAll() {
    $db = static::getDB();
    $stmt = $db->query('SELECT id, name FROM users');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  const TABLE = 'users';

  const GET = '
    SELECT 
    users.user_id, 
    users.role_id, 
    users.email, 
    users.name, 
    users.token, 
    roles.name AS role_name 
    FROM users 
    LEFT JOIN roles 
    ON users.role_id = roles.role_id
  ';

  const DELETE = '
    DELETE FROM 
    users
    WHERE user_id = ?
  ';

  const CREATE = '
    INSERT INTO users (role_id, name, email, password)
    VALUES (?, ?, ?, ?)
  ';

  const UPDATE = '
    UPDATE users
    SET role_id = ?, name = ?, email = ?, password = ?
    WHERE user_id = ?
  ';

  const CHECK_BY_EMAIL = '
    SELECT EXISTS(SELECT 1 FROM users WHERE email = ?)
  ';

  const CHECK_BY_ID = '
    SELECT EXISTS(SELECT 1 FROM users WHERE user_id = ?)
  ';

  const CHECK_BY_TOKEN = '
    SELECT EXISTS(SELECT 1 FROM users WHERE token = ?)
  ';
}
