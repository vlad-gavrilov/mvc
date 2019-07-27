<?php

/**
 * Контроллер панели администратора
 */
class AdminController extends AdminBase
{
  /**
   * Action для панели администратора
   *
   * @return true
   */
  public function actionIndex() {
    include(ROOT . '/views/admin/index.php');
    return true;
  }
}
