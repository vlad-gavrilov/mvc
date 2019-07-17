<?php

class User
{
  public static function checkDataRegister($userData) {
    $errors = false;
    if (self::incorrectName($userData['name'])) {
      $errors[] = 'Имя должно должно содержать как минимум два символа';
    }
    if (self::incorrectEmail($userData['email'])) {
      $errors[] = 'Неправильный email';
    } elseif (self::EmailExists($userData['email'])) {
        $errors[] = 'Такой email уже используется другим пользователем';
    }
    if (self::incorrectPassword($userData['password'])) {
      $errors[] = 'Пароль должен быть длинее пяти символов';
    }
    return $errors;
  }

  public static function checkDataLogin($userData) {
    $errors = false;
    if (self::incorrectEmail($userData['email'])) { $errors[] = 'Неправильный email'; }
    if (self::incorrectPassword($userData['password'])) { $errors[] = 'Пароль должен быть длинее пяти символов'; }
    return $errors;
  }

  public static function incorrectName($name) {
    if (strlen($name) < 2) {
        return true;
    }
  }

  public static function incorrectEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        return true;
    }
  }

  public static function incorrectPassword($password)
  {
    if (strlen($password) < 6) {
        return true;
    }
  }

  public static function EmailExists($email)
  {
    $db = Db::getConnection();
    $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

    $result = $db->prepare($sql);
    $result->bindParam(':email', $email, PDO::PARAM_STR);
    $result->execute();

    if ($result->fetchColumn())
        return true;
    return false;
  }

  public static function register($userData)
  {
    $db = Db::getConnection();

    $sql = 'INSERT INTO user (name, email, password) ' . 'VALUES (:name, :email, :password)';

    $result = $db->prepare($sql);
    $result->bindParam(':name', $userData['name'], PDO::PARAM_STR);
    $result->bindParam(':email', $userData['email'], PDO::PARAM_STR);
    $result->bindParam(':password', $userData['password'], PDO::PARAM_STR);
    return $result->execute();
  }

  public static function checkUserExists($userData)
  {
    $db = Db::getConnection();

    $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

    $result = $db->prepare($sql);
    $result->bindParam(':email', $userData['email'], PDO::PARAM_STR);
    $result->bindParam(':password', $userData['password'], PDO::PARAM_STR);
    $result->execute();

    $user = $result->fetch();

    if ($user) {
      return $user['id'];
    }

    return false;
  }

  public static function auth($id) {
    $_SESSION['user'] = $id;
  }

  public static function logout() {
    unset($_SESSION["user"]);
  }

  public static function isLogged() {
    if (isset($_SESSION['user'])) {
      return $_SESSION['user'];
    } else {
      return false;
    }
  }

  public static function getUserInfoById($id) {
    $db = Db::getConnection();
    $sql = 'SELECT * FROM user WHERE id = :id';

    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();

    return $result->fetch();
  }

  public static function edit($newUserData) {
    $db = Db::getConnection();
    $id = User::isLogged();
    $sql = 'UPDATE user
            SET name = :name,
                email = :email,
                password = :password
            WHERE id = :id';

    $result = $db->prepare($sql);
    $result->bindParam(':name', $newUserData['name'], PDO::PARAM_STR);
    $result->bindParam(':email', $newUserData['email'], PDO::PARAM_STR);
    $result->bindParam(':password', $newUserData['password'], PDO::PARAM_STR);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    return $result->execute();
  }

}
