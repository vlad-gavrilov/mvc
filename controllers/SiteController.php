<?php

/**
 * Контроллер главной страницы сайта
 */
class SiteController extends Controller
{
  /**
   * Action для главной страницы сайта
   *
   * @return true
   */
  public function actionIndex() {
    // Получаем 6 последних товаров
    $recommendedList = Products::getRecommendedProducts();

    include(ROOT . '/views/site/index.php');
    return true;
  }
}
