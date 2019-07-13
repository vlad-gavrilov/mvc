<?php

class Categories
{
  public static function getCategoriesList() {
    $db = Db::getConnection();
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

  public static function getCategoryById($id) {
    $db = Db::getConnection();
    $sql = 'SELECT id, name FROM category WHERE status = 1 and id = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    return $result->fetch();
  }
}
