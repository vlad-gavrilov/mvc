<?php

/**
 * Модель для работы с категориями
 */
class Categories
{
  /**
   * Получить список категорий
   *
   * @return array
   */
  public static function getCategoriesList() {
    // Соединение с БД
    $db = Db::getConnection();
    // Выбираем id и имя категорий
    $sql = 'SELECT id, name FROM category WHERE status = 1 ORDER BY sort_order';
    $result = $db->query($sql);
    $categoryList = array();
    $i = 0;
    while($row = $result->fetch()) {
      $categoryList[$i]['id'] = $row['id'];
      $categoryList[$i]['name'] = $row['name'];
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
}
