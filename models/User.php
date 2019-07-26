<?php

/**
 * Модель для работы с пользователем
 */
class User
{
  /**
   * Проверка правильности введенных данных при регистрации
   *
   * @param array $userData Массив с данными, введенными пользователем
   * @return array|false
   */
  public static function checkDataRegister($userData) {
    // Массив с ошибками по умолчанию false
    $errors = false;
    // Если введенное имя некорректно, то пишем соответствующую ошибку в массив ошибок
    if (self::incorrectName($userData['name'])) {
      $errors[] = 'Имя должно должно содержать как минимум два символа';
    }
    // Если введенный email некорректен, то пишем соответствующую ошибку в массив ошибок
    if (self::incorrectEmail($userData['email'])) {
      $errors[] = 'Неправильный email';
    // Если введенный email корректен, но уже используется, то пишем соответствующую ошибку в массив ошибок
    } elseif (self::EmailExists($userData['email'])) {
        $errors[] = 'Такой email уже используется другим пользователем';
    }
    // Если введенный пароль некорректен, то пишем соответствующую ошибку в массив ошибок
    if (self::incorrectPassword($userData['password'])) {
      $errors[] = 'Пароль должен быть длинее пяти символов';
    }
    return $errors;
  }

  /**
   * Проверка правильности введенных данных при входе в систему
   *
   * @param array $userData Массив с данными, введенными пользователем
   * @return array|false
   */
  public static function checkDataLogin($userData) {
    // Массив с ошибками по умолчанию false
    $errors = false;
    // Если введенный email некорректен, то пишем соответствующую ошибку в массив ошибок
    if (self::incorrectEmail($userData['email'])) { $errors[] = 'Неправильный email'; }
    // Если введенный пароль некорректен, то пишем соответствующую ошибку в массив ошибок
    if (self::incorrectPassword($userData['password'])) { $errors[] = 'Пароль должен быть длинее пяти символов'; }
    return $errors;
  }

  /**
   * Проверка правильности введенных данных при редактировании
   *
   * @param array $userData Массив с данными, введенными пользователем
   * @return array|false
   */
  public static function checkDataEdit($userData) {
    // Массив с ошибками по умолчанию false
    $errors = false;
    // Если введенное имя некорректно, то пишем соответствующую ошибку в массив ошибок
    if (self::incorrectName($userData['name'])) { $errors[] = 'Имя должно должно содержать как минимум два символа'; }
    // Если введенный email некорректен, то пишем соответствующую ошибку в массив ошибок
    if (self::incorrectEmail($userData['email'])) { $errors[] = 'Неправильный email'; }
    // Если введенный пароль некорректен, то пишем соответствующую ошибку в массив ошибок
    if (self::incorrectPassword($userData['password'])) { $errors[] = 'Пароль должен быть длинее пяти символов'; }
    return $errors;
  }

  /**
   * Обнаружение наличия ошибок в введенном имени
   *
   * @param string $name Имя пользователя
   * @return true|void
   */
  public static function incorrectName($name) {
    // Длина строки не должна быть менее 2 символа
    // Используется кодировка UTF-8
    if (mb_strlen($name, 'UTF-8') < 2) {
        return true;
    }
  }

  /**
   * Обнаружение наличия ошибок в введенном email
   *
   * @param string $email email пользователя
   * @return true|void
   */
  public static function incorrectEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        return true;
    }
  }

  /**
   * Обнаружение наличия ошибок в введенном пароле
   *
   * @param string $password Пароль пользователя
   * @return true|void
   */
  public static function incorrectPassword($password) {
    // Длина строки не должна быть менее 6 символов
    // Используется кодировка UTF-8
    if (mb_strlen($password, 'UTF-8') < 6) {
        return true;
    }
  }

  /**
   * Обнаружение наличия ошибок в введенном телефоне
   *
   * @param string $phone Телефон пользователя
   * @return true|void
   */
  public static function incorrectPhone($phone) {
    // Длина строки не должна быть менее 5 и более 14 символов
    // Используется кодировка UTF-8
    if (mb_strlen($phone, 'UTF-8') < 5 || mb_strlen($phone, 'UTF-8') > 14) {
      // Если строка состоит только из числовых символов
      if (ctype_digit($phone)) {
        return true;
      }
    }
  }

  /**
   * Обнаружение наличия введенного email в БД
   *
   * @param string $email email пользователя
   * @return boolean
   */
  public static function EmailExists($email) {
    // Соединение с БД
    $db = Db::getConnection();
    // Получаем количество строк с данным email
    $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

    $result = $db->prepare($sql);
    $result->bindParam(':email', $email, PDO::PARAM_STR);
    $result->execute();

    // Получаем данные первого и единственного столбца результирующего набора.
    // Если количество отлично от нуля, возвращаем true, иначе - false
    if ($result->fetchColumn())
        return true;
    return false;
  }

  /**
   * Регистрация пользователя в БД
   *
   * @param array $userData Данные пользователя
   * @return boolean
   */
  public static function register($userData) {
    // Соединение с БД
    $db = Db::getConnection();

    // Вставляем в таблицу user данные пользователя
    $sql = 'INSERT INTO user (name, email, password) ' . 'VALUES (:name, :email, :password)';

    $result = $db->prepare($sql);
    $result->bindParam(':name', $userData['name'], PDO::PARAM_STR);
    $result->bindParam(':email', $userData['email'], PDO::PARAM_STR);
    $result->bindParam(':password', $userData['password'], PDO::PARAM_STR);
    // Возвращаем true в случае успешного завершения записи, а в случае возникновения ошибки возвращаем false
    return $result->execute();
  }

  /**
   * Проверка существования в БД пользователя с заданными email и паролем
   *
   * @param array $userData Данные пользователя
   * @return integer|false
   */
  public static function checkUserExists($userData) {
    // Соединение с БД
    $db = Db::getConnection();

    // Выбираем id пользователя с заданными email и паролем
    $sql = 'SELECT id FROM user WHERE email = :email AND password = :password';

    $result = $db->prepare($sql);
    $result->bindParam(':email', $userData['email'], PDO::PARAM_STR);
    $result->bindParam(':password', $userData['password'], PDO::PARAM_STR);
    $result->execute();

    $user = $result->fetch();

    // Если пользователь с заданными email и паролем существует, то возвращаем его id
    if ($user) {
      return $user['id'];
    }

    // Иначе возвращаем false
    return false;
  }

  /**
   * Аутентификация пользователя
   *
   * @param integer $id Идентификатор пользователя
   * @return void
   */
  public static function auth($id) {
    $_SESSION['user'] = $id;
  }

  /**
   * Выход пользователя из системы
   *
   * @return void
   */
  public static function logout() {
    unset($_SESSION["user"]);
  }

  /**
   * Проверка того, что пользователь аутентифицирован в системе
   *
   * @return integer|false
   */
  public static function isLogged() {
    // Если $_SESSION['user'] определено идентификатором пользователя, то возвращаем это значение
    // Иначе возвращаем false
    // Эта строка эквивалентна следующему:
    // return isset($_SESSION['user']) ? $_SESSION['user'] : false;
    return $_SESSION['user'] ?? false;
  }

  /**
   * Получить информацию о пользователе по его идентификатору
   *
   * @param integer $id Идентификатор пользователя
   * @return mixed|false
   */
  public static function getUserInfoById($id) {
    // Соединение с БД
    $db = Db::getConnection();
    // Выбрать всех пользователей с заданным id
    $sql = 'SELECT * FROM user WHERE id = :id';

    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();

    return $result->fetch();
  }

  /**
   * Редактировать данные пользователя
   *
   * @param array $newUserData Новые данные пользователя
   * @return boolean
   */
  public static function edit($newUserData) {
    // Соединение с БД
    $db = Db::getConnection();
    // Получаем id пользователя
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
    // Возвращаем true в случае успешного завершения записи, а в случае возникновения ошибки возвращаем false
    return $result->execute();
  }

}
