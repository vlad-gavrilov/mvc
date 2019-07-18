<?php

/**
 * Контроллер категории
 */
class CategoryController extends Controller
{

  /**
   * Action для страницы отображения содержимого категории
   *
   * @param integer $categoryId идентификатор категории
   * @return true
   */
  public function actionView($categoryId) {
    // Получаем список названий категорий
    $categoryItem = Categories::getCategoryById($categoryId);
    // Получаем список товаров в данной категории
    $productList = Products::getProductsInCategory($categoryId);

    include(ROOT . '/views/category/category.php');
    return true;
  }
}
