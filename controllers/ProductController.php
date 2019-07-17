<?php

class ProductController extends Controller
{
  public function actionView($productId) {
    $product = Products::getProductById($productId);
    // var_dump($product);
    include(ROOT . '/views/product/product.php');
    return true;
  }
}
