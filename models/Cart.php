<?php

class Cart
{
  public static function getItemsInCart() {
    if (isset($_SESSION['products'])) {
        $items = $_SESSION['products'];
        $productsInCart = array();
        foreach ($items as $id => $count) {
          $productsInCart[$id] = Products::getProductById($id);
          $productsInCart[$id]['count'] = $count;
        }
        return $productsInCart;
    }
    return null;
  }

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

  public static function addIntoCart($id) {
    // Приводим $id к типу integer
    $id = intval($id);
    // Пустой массив для товаров в корзине
    $productsInCart = array();
    // Если в корзине уже есть товары (они хранятся в сессии)
    if (isset($_SESSION['products'])) {
        // То заполним наш массив товарами
        $productsInCart = $_SESSION['products'];
    }
    // Проверяем есть ли уже такой товар в корзине
    if (array_key_exists($id, $productsInCart)) {
        // Если такой товар есть в корзине, но был добавлен еще раз, увеличим количество на 1
        ++$productsInCart[$id];
    } else {
        // Если нет, добавляем id нового товара в корзину с количеством 1
        $productsInCart[$id] = 1;
    }
    // Записываем массив с товарами в сессию
    $_SESSION['products'] = $productsInCart;
    // Возвращаем количество товаров в корзине
    return self::countItems();
  }

  public static function countItems()
  {
      // Проверка наличия товаров в корзине
      if (isset($_SESSION['products'])) {
          // Если массив с товарами есть
          // Подсчитаем и вернем их количество
          $count = 0;
          foreach ($_SESSION['products'] as $id => $quantity) {
              $count = $count + $quantity;
          }
          return $count;
      } else {
          // Если товаров нет, вернем 0
          return 0;
      }
  }

  public static function deleteItemFromCart($id) {
    // Приводим $id к типу integer
    $id = intval($id);
    // Если в корзине есть товар с нужным id
    if (isset($_SESSION['products'][$id])) {
        unset($_SESSION['products'][$id]);
    }
  }
}
