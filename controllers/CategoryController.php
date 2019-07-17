<?php

class CategoryController extends Controller
{
  public function actionView($categoryId) {
    $categoryItem = Categories::getCategoryById($categoryId);
    $productList = Products::getProductsInCategory($categoryId);
    // var_dump($productList);
    include(ROOT . '/views/category/category.php');
    return true;
  }
}
