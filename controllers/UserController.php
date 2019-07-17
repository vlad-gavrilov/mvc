<?php

class UserController extends Controller
{
  public function actionIndex () {
    $id = User::isLogged();
    if (!$id) {
      header('Location: /user/login');
    }
    $userData = User::getUserInfoById($id);
    require_once(ROOT . '/views/user/index.php');
    return true;
  }

  public function actionRegister () {
    $result = false;
    $userData['name'] = '';
    $userData['email'] = '';
    $userData['password'] = '';

    if (isset($_POST['submit'])) {
      $userData['name'] = $_POST['name'];
      $userData['email'] = $_POST['email'];
      $userData['password'] = $_POST['password'];

      $errors = User::checkDataRegister($userData);

      if ($errors == false) {
          $result = User::register($userData);
      }
    }

    require_once(ROOT . '/views/user/register.php');
    return true;
  }

  public function actionLogin()
  {
    $result = false;
    $userData['email'] = '';
    $userData['password'] = '';

    // Если данные были отправлены методом POST
    if (isset($_POST['submit'])) {
      $userData['email'] = $_POST['email'];
      $userData['password'] = $_POST['password'];

      //Валидация данных, введенных пользователем
      $errors = User::checkDataLogin($userData);

      // Если ошибок нет
      if ($errors == false) {
        // Проверяем, есть ли пользователь с таким email и паролем. Если да, то возвращаем id этого пользователя
        $id = User::checkUserExists($userData);
        if ($id == false) {
          $errors[] = 'Пользователь с таким email и паролем не найден';
        } else {
          // Аутентификация пользователя
          User::auth($id);
          // Перемещаем все товары в корзине из сессии в базу данных
          Cart::moveCartFromSessionToDb();
          // Редирект на личный кабинет
          header('Location: /user');
        }
      }
    }

    require_once(ROOT . '/views/user/login.php');
    return true;
  }

  public function actionLogout() {
    User::logout();
    header('Location: /');
  }

  public function actionEdit() {
    $id = User::isLogged();
    if (!$id) {
      header('Location: /user/login');
    }
    $userData = User::getUserInfoById($id);

    $result = false;

    if (isset($_POST['submit'])) {
      if ($_POST['name']) {
        $newUserData['name'] = $_POST['name'];
      } else {
        $newUserData['name'] = $userData['name'];
      }
      if ($_POST['email']) {
        $newUserData['email'] = $_POST['email'];
      } else {
        $newUserData['email'] = $userData['email'];
      }
      if ($_POST['password']) {
        $newUserData['password'] = $_POST['password'];
      } else {
        $newUserData['password'] = $userData['password'];
      }

      $errors = User::checkDataRegister($newUserData);

      if ($errors == false) {
        $result = User::edit($newUserData);
      }
    }

    require_once(ROOT . '/views/user/edit.php');
    return true;
  }

}
