<?php

/**
 * Контроллер пользователя
 */
class UserController extends Controller
{
  /**
   * Action для страницы личного кабинета
   *
   * @return boolean true
   */
  public function actionIndex () {
    // Получаем id пользователя
    $id = User::isLogged();
    // Если пользователь не авторизован, то редирект на страницу входа
    if (!$id) {
      header('Location: /user/login');
    }
    // Получаем данные о пользователе
    $userData = User::getUserInfoById($id);
    require_once(ROOT . '/views/user/index.php');
    return true;
  }

  /**
   * Action для страницы регистрации
   *
   * @return boolean true
   */
  public function actionRegister () {
    $result = false;
    $userData['name'] = '';
    $userData['email'] = '';
    $userData['password'] = '';

    // Если данные отправлены из формы методом POST
    if (isset($_POST['submit'])) {
      // Считываем данные из формы
      $userData['name'] = $_POST['name'];
      $userData['email'] = $_POST['email'];
      $userData['password'] = $_POST['password'];

      // Проверяем валидность данных введенных пользователем
      $errors = User::checkDataRegister($userData);

      // Если данные прошли валидацию
      if ($errors == false) {
        // Регистрируем пользователя
        $result = User::register($userData);
      }
    }
    require_once(ROOT . '/views/user/register.php');
    return true;
  }

  /**
   * Action для страницы входа в систему
   *
   * @return boolean true
   */
  public function actionLogin()
  {
    $result = false;
    $userData['email'] = '';
    $userData['password'] = '';

    // Если данные отправлены из формы методом POST
    if (isset($_POST['submit'])) {
      // Считываем данные из формы
      $userData['email'] = $_POST['email'];
      $userData['password'] = $_POST['password'];

      // Проверяем валидность данных введенных пользователем
      $errors = User::checkDataLogin($userData);

      // Если данные прошли валидацию
      if ($errors == false) {
        // Проверяем, есть ли пользователь с таким email и паролем. Если да, то возвращаем id этого пользователя
        $id = User::checkUserExists($userData);
        // Если пользователь не найден
        if ($id == false) {
          $errors[] = 'Пользователь с таким email и паролем не найден';
        } else {
          // Аутентификация пользователя
          User::auth($id);
          // Перемещаем все товары в корзине из сессии в базу данных
          CartAuthorized::moveCartFromSessionToDb();
          // Редирект на личный кабинет
          header('Location: /user');
        }
      }
    }
    require_once(ROOT . '/views/user/login.php');
    return true;
  }

  /**
   * Action для страницы выхода из системы
   *
   * @return void
   */
  public function actionLogout() {
    User::logout();
    header('Location: /');
  }

  /**
   * Action для страницы редактирования данных пользователя
   *
   * @return boolean true
   */
  public function actionEdit() {
    // Получаем id пользователя
    $id = User::isLogged();
    // Если пользователь не авторизован, то редирект на страницу входа
    if (!$id) {
      header('Location: /user/login');
    }
    // Получаем данные о пользователе
    $userData = User::getUserInfoById($id);

    $result = false;

    // Если данные отправлены из формы методом POST
    if (isset($_POST['submit'])) {
      // Если имя было передано в форму, то $newUserData['name'] присваиваем это значение, иначе присваиваем текущее имя пользователя
      // Эта строка эквивалентна: $newUserData['name'] = $_POST['name'] ? $_POST['name'] : $userData['name'];
      $newUserData['name'] = $_POST['name'] ?: $userData['name'];
      $newUserData['email'] = $_POST['email'] ?: $userData['email'];
      $newUserData['password'] = $_POST['password'] ?: $userData['password'];

      // Проверяем валидность данных введенных пользователем
      $errors = User::checkDataEdit($newUserData);

      // Если данные прошли валидацию
      if ($errors == false) {
        // Применяем изменения
        $result = User::edit($newUserData);
      }
    }

    require_once(ROOT . '/views/user/edit.php');
    return true;
  }

}
