<?php

/**
 * Компонент для наследования остальными контроллерами
 * Реализует свойства общие для всех контроллеров
 */
class Controller
{
  /**
   * Список категорий
   *
   * @var array
   */
  protected $listOfCategories;

  /**
   * Идентификатор пользователя
   *
   * @var integer|null
   */
  protected $isRegistered;
  /**
   * Информация о пользователе
   *
   * @var array
   */
  protected $userInfo;

  /**
   * Товары в корзине
   *
   * @var array
   */
  protected $cartItems;
  /**
   * Суммарная стоимость товаров в корзине
   *
   * @var integer
   */
  protected $total;

  /**
   * Конструктор
   */
  public function __construct() {
    // Получаем список категорий
    $this->listOfCategories = Categories::getCategoriesList();
    // Получаем идентификатор пользователя
    $this->isRegistered = User::isLogged();

    // Если пользователь авторизован
    if ($this->isRegistered) {
      $this->userInfo = User::getUserInfoById($this->isRegistered);
      $this->cartItems = CartAuthorized::getItemsInCart();
      $this->total = CartAuthorized::getTotalCostAndCount($this->cartItems);
    // Если пользователь неавторизован
    } else {
      $this->cartItems = CartUnauthorized::getItemsInCart();
      $this->total = CartUnauthorized::getTotalCostAndCount($this->cartItems);
    }
  }

}
