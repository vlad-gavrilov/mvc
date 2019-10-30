<?php

/**
 * Модель для работы с заказами
 */
class Order
{
  /**
  * Сохранить заказ в БД
  *
  * @param string $userName Имя
  * @param string $userPhone Телефон
  * @param string $userComment Комментарий
  * @param array $products Массив с товарами
  * @param integer $userId id пользователя
  * @return boolean
  */
  public static function save($userName, $userPhone, $userComment, $products, $userId = false) {
    // Переводим массив с товарами в формат json
    $products = json_encode($products);
    // Подключаемся к БД
    $db = Db::getConnection();
    // SQL запрос, который добавляет новую строку в таблицу заказов
    $sql = 'INSERT INTO product_order(user_name, user_phone, user_comment, products, user_id) VALUES
            (:user_name, :user_phone, :user_comment, :products, :user_id)';
    // Подготавливаем запрос
    $result = $db->prepare($sql);
    // Связываем параметры с соответствующими переменными
    $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
    $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
    $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
    $result->bindParam(':products', $products, PDO::PARAM_STR);
    $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
    // Выполняем запрос
    return $result->execute();
  }

  /**
  * Получить список всех заказов
  *
  * @return array
  */
  public static function getOrdersList() {
    // Подключаемся к БД
    $db = Db::getConnection();
    // Выбираем все заказы
    $sql = 'SELECT * FROM product_order';
    // Выполнение запроса
    $result = $db->query($sql);
    $i = 0;
    $ordersList = array();
    // Считываем результаты в массив
    while($row = $result->fetch()) {
      $ordersList[$i] = $row;
      ++$i;
    }
    return $ordersList;
  }

  /**
  * Получить данные о заказе по его идентификатору
  *
  * @return array
  */
  public static function getOrderById($orderId) {
    // Подключаемся к БД
    $db = Db::getConnection();
    // Выбираем все заказы
    $sql = 'SELECT * FROM product_order WHERE id = :orderId';
    $result = $db->prepare($sql);
    $result->bindParam(':orderId', $orderId, PDO::PARAM_INT);
    $result->execute();
    return $result->fetch();
  }

  /**
  * Изменить данные о заказе
  *
  * @param array $options Параметры заказа
  * @return array
  */
  public static function updateOrder($options) {
    // Соединение с БД
    $db = Db::getConnection();
    // Редактируем заказ
    $sql = 'UPDATE product_order
            SET
            user_name = :user_name,
            user_phone = :user_phone,
            user_comment = :user_comment,
            status = :status
            WHERE id = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':user_name', $options['user_name'], PDO::PARAM_STR);
    $result->bindParam(':user_phone', $options['user_phone'], PDO::PARAM_STR);
    $result->bindParam(':user_comment', $options['user_comment'], PDO::PARAM_STR);
    $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
    $result->bindParam(':id', $options['id'], PDO::PARAM_INT);
    return $result->execute();
  }

  /**
   * Удаляет заказ
   *
   * @param integer $id Идентификатор заказа
   * @return true|null
   */
  public static function deleteOrder($id) {
    // Соединение с БД
    $db = Db::getConnection();
    // Удаляем заказ с заданным id
    $sql = 'DELETE FROM product_order WHERE id = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    return $result->execute();
  }
}
