<?php

/**
 * Контроллер управления заказами
 */
class AdminOrderController extends AdminBase
{
  /**
   * Action для страницы управления заказами
   *
   * @return true
   */
  public function actionIndex() {
    // Получаем список всех заказов
    $ordersList = Order::getOrdersList();

    include(ROOT . '/views/admin/order/index.php');
    return true;
  }

  /**
   * Action для просмотра заказа
   *
   * @param integer $orderId Идентификатор заказа
   * @return true
   */
  public function actionView($orderId) {
    $orderInfo = Order::getOrderById($orderId);
    $arrayOfOrderedProducts = json_decode($orderInfo['products'], true);
    $listOfOrderedProducts = array();
    foreach ($arrayOfOrderedProducts as $id => $count) {
      $currentProduct = Products::getProductById($id);
      $listOfOrderedProducts[$id]["name"] = $currentProduct['name'];
      $listOfOrderedProducts[$id]["category_id"] = $currentProduct['category_id'];
      $listOfOrderedProducts[$id]["code"] = $currentProduct['code'];
      $listOfOrderedProducts[$id]["price"] = $currentProduct['price'];
      $listOfOrderedProducts[$id]["availability"] = $currentProduct['availability'];
      $listOfOrderedProducts[$id]["count"] = $count;
    }
    include(ROOT . '/views/admin/order/view.php');
    return true;
  }

  /**
   * Action для страницы редактирования заказа
   *
   * @param $orderId Идентификатор редактируемого заказа
   * @return true
   */
  public function actionUpdate($orderId) {
    // Получаем информацию о заказе
    $orderInfo = Order::getOrderById($orderId);
    // Если форма была отправлена
    if(isset($_POST['submit'])) {
      $options = array();
      // Получаем данные из формы
      $options['user_name'] = $_POST['user_name'];
      $options['user_phone'] = $_POST['user_phone'];
      $options['user_comment'] = $_POST['user_comment'];
      $options['status'] = $_POST['status'];
      // Добавляем в массив опций id заказа
      $options['id'] = $orderId;
      // Редактируем заказ в БД
      Order::updateOrder($options);
      // Редирект на страницу управлениями заказами
      header('Location: /admin/order');
    }
    include(ROOT . '/views/admin/order/update.php');
    return true;
  }

  /**
   * Action для страницы удаления заказа
   *
   * @param $orderId Идентификатор удаляемого заказа
   * @return true
   */
  public function actionDelete($orderId) {
    // Если была нажата кнопка удаления заказа
    if (isset($_POST['submit'])) {
      // Удаляем заказ из БД
      Order::deleteOrder($orderId);
      // Редирект на страницу управлениями заказами
      header('Location: /admin/order');
    }
    include(ROOT . '/views/admin/order/delete.php');
    return true;
  }
}
