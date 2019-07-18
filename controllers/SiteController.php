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
    // Получаем 15 последних товаров
    $latestList = Products::getLatestProducts();

    include(ROOT . '/views/site/index.php');
    return true;
  }
}
