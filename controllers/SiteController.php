<?php

class SiteController extends Controller
{
  public function actionIndex () {
    $latestList = Products::getLatestProducts();
    include(ROOT . '/views/site/index.php');
    return true;
  }
}
