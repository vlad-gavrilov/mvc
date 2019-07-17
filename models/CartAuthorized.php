<?php

class CartAuthorized
{
  public static function getItemsInCart() {
    $userId = User::isLogged();

    $db = Db::getConnection();
    $sql = 'SELECT * FROM cart WHERE id_user = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $userId, PDO::PARAM_INT);
    $result->execute();

    $productsInCart = array();

    while ($row = $result->fetch()) {
      $productsInCart[$row['id_product']] = Products::getProductById($row['id_product']);
      $productsInCart[$row['id_product']]['count'] = $row['count'];
    }
    return $productsInCart;
  }

  public static function getTotalCostAndCount($cartItems) {
    $userId = User::isLogged();

    $db = Db::getConnection();
    $sql = 'SELECT * FROM cart WHERE id_user = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $userId, PDO::PARAM_INT);
    $result->execute();

    $total['cost'] = 0;
    $total['count'] = 0;

    while ($row = $result->fetch()) {
      $total['cost'] += Products::getProductById($row['id_product'])['price'] * $row['count'];
      $total['count'] += $row['count'];
    }
    return $total;
  }

  public static function addIntoCart($idProduct, $count = 1) {
    // Получаем id пользователя
    $userId = User::isLogged();

    $db = Db::getConnection();
    $sql = 'SELECT count FROM cart WHERE id_user = :id_user AND id_product = :id_product';
    $result = $db->prepare($sql);
    $result->bindParam(':id_user', $userId, PDO::PARAM_INT);
    $result->bindParam(':id_product', $idProduct, PDO::PARAM_INT);
    $result->execute();

    $countInCart = $result->fetch()['count'];

    if ($countInCart == 0) {
      $sql = 'INSERT INTO cart (id_user, id_product, count) VALUES (:id_user, :id_product, :count)';
      $result = $db->prepare($sql);
      $result->bindParam(':id_user', $userId, PDO::PARAM_INT);
      $result->bindParam(':id_product', $idProduct, PDO::PARAM_INT);
      $result->bindParam(':count', $count, PDO::PARAM_INT);
      $result->execute();
    } else {
      $sql = 'UPDATE cart SET count = :countInCart WHERE id_user = :id_user AND id_product = :id_product';
      $countInCart += $count;
      $result = $db->prepare($sql);
      $result->bindParam(':countInCart', $countInCart, PDO::PARAM_INT);
      $result->bindParam(':id_user', $userId, PDO::PARAM_INT);
      $result->bindParam(':id_product', $idProduct, PDO::PARAM_INT);
      $result->execute();
    }

    return self::countItems();
  }

  public static function countItems()
  {
    // Получаем id пользователя
    $userId = User::isLogged();

    $db = Db::getConnection();
    $sql = 'SELECT * FROM cart WHERE id_user = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $userId, PDO::PARAM_INT);
    $result->execute();

    $count = 0;

    while ($row = $result->fetch()) {
      $count += $row['count'];
    }
    return $count;
  }

  public static function deleteItemFromCart($idProduct) {
    // Получаем id пользователя
    $idUser = User::isLogged();

    $db = Db::getConnection();
    $sql = 'DELETE FROM cart WHERE id_user = :id_user AND id_product = :id_product';
    $result = $db->prepare($sql);
    $result->bindParam(':id_user', $idUser, PDO::PARAM_INT);
    $result->bindParam(':id_product', $idProduct, PDO::PARAM_INT);
    $result->execute();
  }

  public static function moveCartFromSessionToDb() {
    foreach ($_SESSION['products'] as $productId => $count) {
      self::addIntoCart($productId, $count);
      if (isset($_SESSION['products'][$productId])) {
        unset($_SESSION['products'][$productId]);
      }
    }
    unset($_SESSION['products']);
  }

}
