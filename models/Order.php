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
}
