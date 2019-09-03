<?php

/**
 * Модель для работы с категориями
 */
class Categories
{
  /**
   * Получить список активных категорий
   *
   * @return array
   */
  public static function getCategoriesList() {
    // Соединение с БД
    $db = Db::getConnection();
    // Выбираем id и имя категорий
    $sql = 'SELECT id, name, logo FROM category WHERE status = 1 ORDER BY sort_order';
    $result = $db->query($sql);
    $categoryList = array();
    $i = 0;
    while($row = $result->fetch()) {
      $categoryList[$i]['id'] = $row['id'];
      $categoryList[$i]['name'] = $row['name'];
      $categoryList[$i]['logo'] = $row['logo'];
      ++$i;
    }
    return $categoryList;
  }

  /**
   * Получить список всех категорий
   *
   * @return array
   */
  public static function getCategoriesListAdmin() {
    // Соединение с БД
    $db = Db::getConnection();
    // Выбираем id и имя категорий
    $sql = 'SELECT * FROM category ORDER BY sort_order';
    $result = $db->query($sql);
    $categoryList = array();
    $i = 0;
    while($row = $result->fetch()) {
      $categoryList[$i]['id'] = $row['id'];
      $categoryList[$i]['name'] = $row['name'];
      $categoryList[$i]['sort_order'] = $row['sort_order'];
      $categoryList[$i]['status'] = $row['status'];
      $categoryList[$i]['logo'] = $row['logo'];
      ++$i;
    }
    return $categoryList;
  }

  /**
   * Получить категорию по ее идентификатору
   *
   * @param integer $id Идентификатор категории
   * @return mixed|false
   */
  public static function getCategoryById($id) {
    // Соединение с БД
    $db = Db::getConnection();
    // Выбираем id и имя категории
    $sql = 'SELECT id, name FROM category WHERE status = 1 and id = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    return $result->fetch();
  }

  /**
   * Получить полную информацию о (в т.ч. и деактивированной) категории по ее идентификатору
   *
   * @param integer $id Идентификатор категории
   * @return mixed|false
   */
  public static function getCategoryByIdAdmin($id) {
    // Соединение с БД
    $db = Db::getConnection();
    // Выбираем id и имя категории
    $sql = 'SELECT * FROM category WHERE id = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    return $result->fetch();
  }

  /**
   * Создает категорию
   *
   * @param array $options Параметры категории
   * @return integer
   */
  public static function createCategory($options) {
    // Соединение с БД
    $db = Db::getConnection();
    // Вставляем новую категорию в таблицу БД
    $sql = 'INSERT INTO `category`
            (`name`, `sort_order`, `status`, `logo`)
            VALUES
            (:name, :sort_order, :status, :logo)';
    $result = $db->prepare($sql);
    $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
    $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
    $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
    $result->bindParam(':logo', $options['logo'], PDO::PARAM_STR);
    // Если новая категория успешно вставлена в таблицу
    if ($result->execute()) {
      // Возвращаем id добавленной записи
      return $db->lastInsertId();
    }
    // Иначе возвращаем 0
    return 0;
  }

  /**
   * Редактирует категорию
   *
   * @param array $options Массив с информацией о категории
   * @return true|null
   */
  public static function updateCategory($options) {
    // Соединение с БД
    $db = Db::getConnection();
    // Редактируем категорию
    $sql = 'UPDATE `category`
            SET
            name = :name,
            sort_order = :sort_order,
            status = :status,
            logo = :logo
            WHERE id = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
    $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
    $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
    $result->bindParam(':logo', $options['logo'], PDO::PARAM_STR);
    $result->bindParam(':id', $options['id'], PDO::PARAM_INT);
    return $result->execute();
  }

  /**
   * Удаляет категорию
   *
   * @param integer $id Идентификатор категории
   * @return true|null
   */
  public static function deleteCategory($id) {
    // Соединение с БД
    $db = Db::getConnection();
    // Удаляем категорию с заданным id
    $sql = 'DELETE FROM category WHERE id = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    return $result->execute();
  }
}
