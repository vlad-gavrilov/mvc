<?php

/**
 * Контроллер товара
 */
class ProductController extends Controller
{
  /**
   * Action для страницы отображения товара
   *
   * @param integer $productId Идентификатор товара
   * @return true
   */
  public function actionView($productId) {
    // Получаем информацию о товаре
    $product = Products::getProductById($productId);

    include(ROOT . '/views/product/product.php');
    return true;
  }
}
