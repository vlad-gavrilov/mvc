<?php

/**
 * Модель для работы с корзиной авторизованного пользователя
 */
class CartAuthorized
{
  /**
   * Получить товары в корзине
   *
   * @return array
   */
  public static function getItemsInCart() {
    // Получаем id пользователя
    $userId = User::isLogged();

    // Соединение с БД
    $db = Db::getConnection();
    // Выбор всех товаров данного пользователя
    $sql = 'SELECT * FROM cart WHERE id_user = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $userId, PDO::PARAM_INT);
    $result->execute();

    $productsInCart = array();

    while ($row = $result->fetch()) {
      // Формируем массив продуктов состоящий из информации о продукте и его количестве в корзине
      $productsInCart[$row['id_product']] = Products::getProductById($row['id_product']);
      $productsInCart[$row['id_product']]['count'] = $row['count'];
    }
    return $productsInCart;
  }

  /**
   * Получить общее количество и стоимость товаров в корзине
   *
   * @param array $cartItems Содержимое корзины
   * @return array
   */
  public static function getTotalCostAndCount($cartItems) {
    $total['cost'] = 0;
    $total['count'] = 0;

    foreach ($cartItems as $idProduct => $product) {
      $total['cost'] += $product['price'] * $product['count'];
      $total['count'] += $product['count'];
    }

    return $total;
  }

  /**
   * Добавить товар в корзину
   *
   * @param integer $idProduct Идентификатор продукта
   * @param integer $count [optional] Количество продукта
   * @return integer
   */
  public static function addIntoCart($idProduct, $count = 1) {
    // Получаем id пользователя
    $userId = User::isLogged();
    // Соединение с БД
    $db = Db::getConnection();
    // Получаем количество нужного товара в корзине
    $sql = 'SELECT count FROM cart WHERE id_user = :id_user AND id_product = :id_product';
    $result = $db->prepare($sql);
    $result->bindParam(':id_user', $userId, PDO::PARAM_INT);
    $result->bindParam(':id_product', $idProduct, PDO::PARAM_INT);
    $result->execute();

    // Товар либо есть в корзине, либо его нет
    $countInCart = $result->fetch()['count'];

    // Если товара нет в корзине
    if ($countInCart == 0) {
      // Вставляем строку с id товара в таблицу
      $sql = 'INSERT INTO cart (id_user, id_product, count) VALUES (:id_user, :id_product, :count)';
      $result = $db->prepare($sql);
      $result->bindParam(':id_user', $userId, PDO::PARAM_INT);
      $result->bindParam(':id_product', $idProduct, PDO::PARAM_INT);
      $result->bindParam(':count', $count, PDO::PARAM_INT);
      $result->execute();
    // Если товар есть в корзине
    } else {
      // Изменяем количество товара на нужно количество
      $sql = 'UPDATE cart SET count = :countInCart WHERE id_user = :id_user AND id_product = :id_product';
      $countInCart += $count;
      $result = $db->prepare($sql);
      $result->bindParam(':countInCart', $countInCart, PDO::PARAM_INT);
      $result->bindParam(':id_user', $userId, PDO::PARAM_INT);
      $result->bindParam(':id_product', $idProduct, PDO::PARAM_INT);
      $result->execute();
    }
    // Возвращаем количество товаров в корзине
    return self::countItems();
  }

  /**
   * Количество товаров в корзине
   *
   * @return integer
   */
  public static function countItems() {
    // Получаем id пользователя
    $userId = User::isLogged();
    // Соединение с БД
    $db = Db::getConnection();
    $sql = 'SELECT count FROM cart WHERE id_user = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $userId, PDO::PARAM_INT);
    $result->execute();

    $count = 0;

    while ($row = $result->fetch()) {
      $count += $row['count'];
    }
    return $count;
  }

  /**
   * Удалить товар из корзины
   *
   * @param integer $idProduct Идентификатор продукта
   * @return boolean
   */
  public static function deleteItemFromCart($idProduct) {
    // Получаем id пользователя
    $idUser = User::isLogged();
    // Соединение с БД
    $db = Db::getConnection();
    $sql = 'DELETE FROM cart WHERE id_user = :id_user AND id_product = :id_product';
    $result = $db->prepare($sql);
    $result->bindParam(':id_user', $idUser, PDO::PARAM_INT);
    $result->bindParam(':id_product', $idProduct, PDO::PARAM_INT);
    return $result->execute();
  }

  /**
   * Переместить все товары, хранящиеся в сессии, в базу данных
   *
   * @return void
   */
  public static function moveCartFromSessionToDb() {
    // Все товары из сессии копируются в таблицу БД
    foreach ($_SESSION['products'] as $productId => $count) {
      self::addIntoCart($productId, $count);
    }
    // По завершении копирования удаляется из сессии массив товаров
    unset($_SESSION['products']);
  }

}
