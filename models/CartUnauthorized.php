<?php

/**
 * Модель для работы с корзиной неавторизованного пользователя
 */
class CartUnauthorized
{
  /**
   * Получить товары в корзине
   *
   * @return array|null
   */
  public static function getItemsInCart() {
    // Если корзина не пуста
    if (isset($_SESSION['products'])) {
        $items = $_SESSION['products'];
        $productsInCart = array();
        foreach ($items as $id => $count) {
          // Формируем массив продуктов состоящий из информации о продукте и его количестве в корзине
          $productsInCart[$id] = Products::getProductById($id);
          $productsInCart[$id]['count'] = $count;
        }
        return $productsInCart;
    }
    // Если корзина пуста
    return null;
  }

  /**
   * Получить id и количество товаров в корзине
   *
   * @return array|null
   */
  public static function getIdAndCount() {
    // Если корзина не пуста
    if (isset($_SESSION['products'])) {
      return $_SESSION['products'];
    }
    // Если корзина пуста
    return null;
  }

  /**
   * Получить общее количество и стоимость товаров в корзине
   *
   * @return array
   */
  public static function getTotalCostAndCount($cartItems) {
    $total['cost'] = 0;
    $total['count'] = 0;
    if (isset($cartItems)) {
      foreach ($cartItems as $id => $product) {
        $total['cost'] += $product['price'] * $product['count'];
        $total['count'] +=  $product['count'];
      }
    }
    return $total;
  }

  /**
   * Добавить товар в корзину
   *
   * @param integer $idProduct Идентификатор продукта
   * @return integer
   */
  public static function addIntoCart($id) {
    // Пустой массив для товаров в корзине
    $productsInCart = array();
    // Если корзина не пуста
    if (isset($_SESSION['products'])) {
        $productsInCart = $_SESSION['products'];
    }
    // Если товар с заданным id есть в корзине
    if (array_key_exists($id, $productsInCart)) {
        ++$productsInCart[$id];
    } else {
        $productsInCart[$id] = 1;
    }
    // Сохраняем в сессию массив товаров
    $_SESSION['products'] = $productsInCart;
    // Возвращаем количество товаров в корзине
    return self::countItems();
  }

  /**
   * Количество элементов в корзине
   *
   * @return integer
   */
  public static function countItems() {
    // Если корзина не пуста
    if (isset($_SESSION['products'])) {
      // Считаем количество товаров
      $count = 0;
      foreach ($_SESSION['products'] as $id => $quantity) {
          $count += $quantity;
      }
      return $count;
    // Если корзина пуста
    } else {
      // Вернем 0
      return 0;
    }
  }

  /**
   * Удалить из корзины товар по идентификатору
   *
   * @param integer $id Идентификатор товара
   * @return void
   */
  public static function deleteItemFromCart($id) {
    // Если такой товар есть в корзине
    if (isset($_SESSION['products'][$id])) {
      // Удаляем его
      unset($_SESSION['products'][$id]);
    }
  }

  /**
   * Удалить из корзины все товары
   *
   * @return void
   */
  public static function clear() {
    // Если такой товары в корзине есть
    if (isset($_SESSION['products'])) {
      // Удаляем их
      unset($_SESSION['products']);
    }
  }

}
