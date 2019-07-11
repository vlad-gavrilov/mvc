<?php

class SiteController extends abstractController
{
  public function actionIndex () {
    include(ROOT . '/views/site/index.php');
    return true;
  }
}
