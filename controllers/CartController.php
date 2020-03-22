<?php

/**
 * Контроллер корзины
 */
class CartController extends Controller
{
  /**
   * Action для страницы отображения содержимого корзины
   *
   * @return true
   */
  public function actionIndex() {
    // Получаем список элементов в корзине через переменную $this->cartItems инициализированную в конструкторе класса-родителя Controller
    $cartItems = $this->cartItems;
    // Получаем сумму всех товаров в корзине через переменную $this->total инициализированную в конструкторе класса-родителя Controller
    $total = $this->total;
    include(ROOT . '/views/cart/cart.php');
    return true;
  }

  /**
   * Action для добавления товара в корзину синхронным способом
   *
   * @param integer $id Идентификатор товара
   * @return void
   */
  public function actionAdd($id) {
    ($this->isRegistered) ? CartAuthorized::addIntoCart($id) : CartUnauthorized::addIntoCart($id);
    $referrer = $_SERVER['HTTP_REFERER'];
    if ($referrer)
      header("Location: $referrer");
    else
      header('Location: /cart');
  }

  /**
   * Action для добавления товара в корзину асинхронным способом
   *
   * @param integer $id Идентификатор товара
   * @return true
   */
  public function actionAddAjax($id) {
    // Если пользователь авторизован, то вызываем метод класса CartAuthorized, иначе - класса CartUnauthorized
    echo ($this->isRegistered) ? CartAuthorized::addIntoCart($id) : CartUnauthorized::addIntoCart($id);
    return true;
  }

  /**
   * Action для удаления товара из корзины
   *
   * @param integer $id Идентификатор товара
   * @return void
   */
  public function actionDelete($id) {
    // Если пользователь авторизован, то вызываем метод класса CartAuthorized, иначе - класса CartUnauthorized
    ($this->isRegistered) ? CartAuthorized::deleteItemFromCart($id) : CartUnauthorized::deleteItemFromCart($id);
    // Перенаправляем пользователя на страницу с корзиной
    header('Location: /cart');
  }

  /**
   * Action для оформления заказа
   *
   * @return true
   */
  public function actionCheckout() {
    // Получаем id пользователя, если он авторизован
    $userId = $this->isRegistered;
    // Если пользователь авторизован
    if ($userId) {
      // Получаем список товаров в корзине
      $productsInCart = CartAuthorized::getIdAndCount();
      // Если корзина пуста, то перенаправляем пользователя на главную страницу
      if (!$productsInCart) {
        header('Location: /');
      }

      // Получаем сумму всех товаров в корзине через переменную $this->total, инициализированную в конструкторе класса-родителя Controller
      $total = $this->total;

      // Поля для формы
      $userName = $this->userInfo['name'];
      $userPhone = false;
      $userComment = false;

      // Статус успешного оформления заказа
      $result = false;

      if (isset($_POST['submit'])) {
        $userName = $_POST['userName'];
        $userPhone = $_POST['userPhone'];
        $userComment = $_POST['userComment'];

        // Массив ошибок
        $errors = false;

        if (User::incorrectName($userName)) {
          $errors[] = 'Неправильное имя';
        }
        if (User::incorrectPhone($userPhone)) {
          $errors[] = 'Неправильный телефон';
        }

        // Если ошибок нет
        if (!$errors) {
          // Сохраняем заказ в БД
          $result = Order::save($userName, $userPhone, $userComment, $productsInCart, $userId);
          // Если запись прошла успешно, то очищаем корзину
          if ($result) {
            CartAuthorized::clear();
          }
        }
      }
    // Если пользователь не авторизован
    } else {
      // Получаем список товаров в корзине
      $productsInCart = CartUnauthorized::getIdAndCount();
      // Если корзина пуста, то перенаправляем пользователя на главную страницу
      if (!$productsInCart) {
        header('Location: /');
      }

      // Получаем сумму всех товаров в корзине через переменную $this->total, инициализированную в конструкторе класса-родителя Controller
      $total = $this->total;

      // Поля для формы
      $userName = false;
      $userPhone = false;
      $userComment = false;

      // Статус успешного оформления заказа
      $result = false;

      if (isset($_POST['submit'])) {
        $userName = $_POST['userName'];
        $userPhone = $_POST['userPhone'];
        $userComment = $_POST['userComment'];

        // Массив ошибок
        $errors = false;

        if (User::incorrectName($userName)) {
          $errors[] = 'Неправильное имя';
        }
        if (User::incorrectPhone($userPhone)) {
          $errors[] = 'Неправильный телефон';
        }

        // Если ошибок нет
        if (!$errors) {
          // Сохраняем заказ в БД
          $result = Order::save($userName, $userPhone, $userComment, $productsInCart);
          // Если запись прошла успешно, то очищаем корзину
          if ($result) {
            CartUnauthorized::clear();
          }
        }
      }
    }
  require_once(ROOT . '/views/cart/checkout.php');
  return true;
  }

}
