<?php

class Products
{
  public static function getProductsInCategory($categoryId) {
    $db = Db::getConnection();
    $sql = 'SELECT * FROM product WHERE category_id = :categoryId';
    $result = $db->prepare($sql);
    $result->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
    $result->execute();
    $i = 0;
    $productList = array();
    while($row = $result->fetch()) {
      $productList[$i] = $row;
      ++$i;
    }
    return $productList;
  }

  public static function getProductById($productId) {
    $db = Db::getConnection();
    $sql = 'SELECT * FROM product WHERE id = :productId';
    $result = $db->prepare($sql);
    $result->bindParam(':productId', $productId, PDO::PARAM_INT);
    $result->execute();
    return $result->fetch();
  }

  public static function getLatestProducts() {
    $db = Db::getConnection();
    $sql = 'SELECT * FROM product WHERE status = 1 ORDER BY id DESC LIMIT 15';
    $result = $db->query($sql);
    $i = 0;
    $latestList = array();
    while($row = $result->fetch()) {
      $latestList[$i] = $row;
      ++$i;
    }
    return $latestList;
  }
}
