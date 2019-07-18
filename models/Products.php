<?php

/**
 * Модель для работы с товаром
 */
class Products
{
  /**
   * Получение списка товаров в данной категории
   *
   * @param integer $categoryId Идентификатор категории
   * @return array
   */
  public static function getProductsInCategory($categoryId) {
    // Соединение с БД
    $db = Db::getConnection();
    // Список товаров с заданным id
    $sql = 'SELECT * FROM product WHERE category_id = :categoryId';
    $result = $db->prepare($sql);
    $result->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
    $result->execute();
    $i = 0;
    $productList = array();
    // Считываем результаты в массив
    while($row = $result->fetch()) {
      $productList[$i] = $row;
      ++$i;
    }
    return $productList;
  }

  /**
   * Получение товара по заданному идентификатору
   *
   * @param integer $productId Идентификатор товара
   * @return mixed|false
   */
  public static function getProductById($productId) {
    // Соединение с БД
    $db = Db::getConnection();
    // Информация о товаре с заданным id
    $sql = 'SELECT * FROM product WHERE id = :productId';
    $result = $db->prepare($sql);
    $result->bindParam(':productId', $productId, PDO::PARAM_INT);
    $result->execute();
    return $result->fetch();
  }

  /**
   * Получение списка последних товаров
   *
   * @return mixed|false
   */
  public static function getLatestProducts() {
    // Соединение с БД
    $db = Db::getConnection();
    // Последние 15 товаров со статусом 1
    $sql = 'SELECT * FROM product WHERE status = 1 ORDER BY id DESC LIMIT 15';
    // Выполнение запроса
    $result = $db->query($sql);
    $i = 0;
    $latestList = array();
    // Считываем результаты в массив
    while($row = $result->fetch()) {
      $latestList[$i] = $row;
      ++$i;
    }
    return $latestList;
  }
}
