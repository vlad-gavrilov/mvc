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

  /**
   * Получение списка рекомендованных товаров
   *
   * @return mixed|false
   */
  public static function getRecommendedProducts() {
    // Соединение с БД
    $db = Db::getConnection();
    // Последние 15 товаров со статусом 1
    $sql = 'SELECT * FROM product WHERE is_recommended = 1 AND status = 1 ORDER BY id DESC LIMIT 6';
    // Выполнение запроса
    $result = $db->query($sql);
    $i = 0;
    $recommendedList = array();
    // Считываем результаты в массив
    while($row = $result->fetch()) {
      $recommendedList[$i] = $row;
      ++$i;
    }
    return $recommendedList;
  }

  /**
   * Получение списка товаров
   *
   * @return array
   */
  public static function getProductsList() {
    // Соединение с БД
    $db = Db::getConnection();
    // Все товары из списка
    $result = $db->query('SELECT id, name, category_id, code, price, availability, brand, is_new, is_recommended, status FROM product ORDER BY id ASC');
    $products = array();
    $i = 0;
    while ($row = $result->fetch()) {
        $products[$i]['id'] = $row['id'];
        $products[$i]['name'] = $row['name'];
        $products[$i]['category_id'] = $row['category_id'];
        $products[$i]['code'] = $row['code'];
        $products[$i]['price'] = $row['price'];
        $products[$i]['availability'] = $row['availability'];
        $products[$i]['brand'] = $row['brand'];
        $products[$i]['is_new'] = $row['is_new'];
        $products[$i]['is_recommended'] = $row['is_recommended'];
        $products[$i]['status'] = $row['status'];
        ++$i;
    }
    return $products;
  }

  /**
   * Добавляет новый товар
   *
   * @param array $options Массив с информацией о товаре
   * @return integer
   */
  public static function createProduct($options) {
    // Соединение с БД
    $db = Db::getConnection();

    // Вставляем новый товар в таблицу БД
    $sql = 'INSERT INTO product
            (name, code, price, category_id, brand, availability, description, is_new, is_recommended, status)
            VALUES
            (:name, :code, :price, :category_id, :brand, :availability, :description, :is_new, :is_recommended, :status)';

    $result = $db->prepare($sql);
    $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
    $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
    $result->bindParam(':price', $options['price'], PDO::PARAM_INT);
    $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
    $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
    $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
    $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
    $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
    $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
    $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
    // Если новый товар успешно вставлен в таблицу
    if ($result->execute()) {
      // Возвращаем id добавленной записи
      return $db->lastInsertId();
    }
    // Иначе возвращаем 0
    return 0;
  }

  /**
   * Редактирует товар
   *
   * @param array $options Массив с информацией о товаре
   * @return true|null
   */
  public static function updateProduct($options) {
    // Соединение с БД
    $db = Db::getConnection();
    // Редактируем товар
    $sql = 'UPDATE product
            SET
            name = :name,
            code = :code,
            price = :price,
            category_id = :category_id,
            brand = :brand,
            availability = :availability,
            description = :description,
            is_new = :is_new,
            is_recommended = :is_recommended,
            status = :status
            WHERE id = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
    $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
    $result->bindParam(':price', $options['price'], PDO::PARAM_INT);
    $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
    $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
    $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
    $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
    $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
    $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
    $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
    $result->bindParam(':id', $options['id'], PDO::PARAM_INT);
    return $result->execute();
  }

  /**
   * Удаляет товар
   *
   * @param integer $id Идентификатор товара
   * @return true|null
   */
  public static function deleteProduct($id) {
    // Соединение с БД
    $db = Db::getConnection();
    // Удаляем товар с заданным id
    $sql = 'DELETE FROM product WHERE id = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    return $result->execute();
  }
}
