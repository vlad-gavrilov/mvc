<?php

/**
 * Контроллер управления товарами
 */
class AdminProductController extends AdminBase
{
  /**
   * Action для страницы управления товарами
   *
   * @return true
   */
  public function actionIndex() {
    // Получаем список всех товаров
    $productsList = Products::getProductsList();

    include(ROOT . '/views/admin/product/index.php');
    return true;
  }

  /**
   * Action для страницы создания товаров
   *
   * @return true
   */
  public function actionCreate() {
    // Получаем список категорий для выпадающего меню
    $categories = Categories::getCategoriesListAdmin();
    // Если форма была отправлена
    if(isset($_POST['submit'])) {
      $options = array();
      // Получаем данные из формы
      $options['name'] = $_POST['name'];
      $options['code'] = $_POST['code'];
      $options['price'] = $_POST['price'];
      $options['category_id'] = $_POST['category_id'];
      $options['brand'] = $_POST['brand'];
      $options['availability'] = $_POST['availability'];
      $options['description'] = $_POST['description'];
      $options['is_new'] = $_POST['is_new'];
      $options['is_recommended'] = $_POST['is_recommended'];
      $options['status'] = $_POST['status'];
      // Массив ошибок
      $errors = false;
      // Если имя не введено
      if (!isset($options['name']) || empty($options['name'])) {
        $errors[] = 'Заполните имя';
      }
      // Если цена не введена
      if (!isset($options['price']) || empty($options['price'])) {
        $errors[] = 'Укажите цену';
      }
      // Если ошибок нет
      if ($errors == false) {
        // Добавляем новый товар в БД
        $id = Products::createProduct($options);
        // Если запись прошла успешно
        if ($id) {
          // Если было загружено фото
          if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            // Переместим его в соответствующую папку и дадим имя
            move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
          }
        }
        // Редирект на страницу управлениями товарами
        header('Location: /admin/product');
      }
    }
    include(ROOT . '/views/admin/product/create.php');
    return true;
  }

  /**
   * Action для страницы редактирования товара
   *
   * @param $productId Идентификатор редактируемого товара
   * @return true
   */
  public function actionUpdate($productId) {
    // Получаем список категорий для выпадающего меню
    $categories = Categories::getCategoriesListAdmin();
    // Получаем информацию о товаре
    $productInfo = Products::getProductById($productId);

    // Если форма была отправлена
    if(isset($_POST['submit'])) {
      $options = array();
      // Получаем данные из формы
      $options['name'] = $_POST['name'];
      $options['code'] = $_POST['code'];
      $options['price'] = $_POST['price'];
      $options['category_id'] = $_POST['category_id'];
      $options['brand'] = $_POST['brand'];
      $options['availability'] = $_POST['availability'];
      $options['description'] = $_POST['description'];
      $options['is_new'] = $_POST['is_new'];
      $options['is_recommended'] = $_POST['is_recommended'];
      $options['status'] = $_POST['status'];
      // Добавляем в массив опций id товара
      $options['id'] = $productId;

      // Редактируем товар в БД
      if (Products::updateProduct($options)) {
        // Если было загружено фото
        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
          // Переместим его в соответствующую папку и дадим имя
          move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$productId}.jpg");
        }
      }
      // Редирект на страницу управлениями товарами
      header('Location: /admin/product');

    }
    include(ROOT . '/views/admin/product/update.php');
    return true;
  }

  /**
   * Action для страницы удаления товара
   *
   * @param $productId Идентификатор удаляемого товара
   * @return true
   */
  public function actionDelete($productId) {
    // Если была нажата кнопка удаления товара
    if (isset($_POST['submit'])) {
      // Удаляем товар из БД
      Products::deleteProduct($productId);
      // Редирект на страницу управлениями товарами
      header('Location: /admin/product');
    }
    include(ROOT . '/views/admin/product/delete.php');
    return true;
  }
}
