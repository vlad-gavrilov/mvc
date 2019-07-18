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
   * Этот метод не используется т.к. есть более совершенный метод actionAddAjax
   * @deprecated
   *
   * @param integer $id Идентификатор товара
   * @return void
   */
  public function actionAdd($id) {
    CartUnauthorized::addIntoCart($id);
    $referrer = $_SERVER['HTTP_REFERER']; //TODO доделать в случае, если $_SERVER['HTTP_REFERER'] == null
    header("Location: $referrer");
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
    // Получаем ссылку на страницу с которой произошел переход
    $referrer = $_SERVER['HTTP_REFERER'];
    // Перенаправляем пользователя на эту страницу
    header("Location: $referrer");
  }

}
