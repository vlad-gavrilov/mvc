<?php

/**
 * Контроллер управления категориями
 */
class AdminCategoryController extends AdminBase
{
  /**
   * Action для страницы управления категориями
   *
   * @return true
   */
  public function actionIndex() {
    // Получаем список всех категорий
    $categoriesList = Categories::getCategoriesListAdmin();

    include(ROOT . '/views/admin/category/index.php');
    return true;
  }

  /**
   * Action для страницы создания категорий
   *
   * @return true
   */
  public function actionCreate() {
    // Если форма была отправлена
    if(isset($_POST['submit'])) {
      $options = array();
      // Получаем данные из формы
      $options['name'] = $_POST['name'];
      $options['sort_order'] = $_POST['sort_order'];
      $options['status'] = $_POST['status'];
      $options['logo'] = htmlspecialchars($_POST['logo']);
      // Массив ошибок
      $errors = false;
      // Если название не введено
      if (!isset($options['name']) || empty($options['name'])) {
        $errors[] = 'Заполните название';
      }
      // Если введенный порядок сортировки не число
      if (!ctype_digit($options['sort_order'])) {
        $errors[] = 'Порядок сортировки должен быть целым неотрицательным числом';
      }
      // Сравниваем длину необработанной строки
      if (mb_strlen($options['logo'], 'UTF-8') > 40) {
        $errors[] = 'Длина наименования логотипа должна быть не более 40 символов';
      }
      // Если ошибок нет
      if ($errors == false) {
        // Добавляем новую категорию в БД
        Categories::createCategory($options);
        // Редирект на страницу управлениями категориями
        header('Location: /admin/category');
      }
    }
    include(ROOT . '/views/admin/category/create.php');
    return true;
  }

  /**
   * Action для страницы редактирования категории
   *
   * @param $categoryId Идентификатор редактируемой категории
   * @return true
   */
  public function actionUpdate($categoryId) {
    // Получаем полную информацию о категории
    $categoryInfo = Categories::getCategoryByIdAdmin($categoryId);

    // Если форма была отправлена
    if(isset($_POST['submit'])) {
      $options = array();
      // Получаем данные из формы
      $options['name'] = $_POST['name'];
      $options['sort_order'] = $_POST['sort_order'];
      $options['status'] = $_POST['status'];
      $options['logo'] = $_POST['logo'];
      // Добавляем в массив опций id категории
      $options['id'] = $categoryId;
      // Массив ошибок
      $errors = false;
      // Если название не введено
      if (!isset($options['name']) || empty($options['name'])) {
        $errors[] = 'Заполните название';
      }
      // Если введенный порядок сортировки не число
      if (!ctype_digit($options['sort_order'])) {
        $errors[] = 'Порядок сортировки должен быть целым неотрицательным числом';
      }
      // Если ошибок нет
      if ($errors == false) {
        Categories::updateCategory($options);
        // Редирект на страницу управлениями категориями
        header('Location: /admin/category');
      }
    }
    include(ROOT . '/views/admin/category/update.php');
    return true;
  }

  /**
   * Action для страницы удаления категории
   *
   * @param $categoryId Идентификатор удаляемой категории
   * @return true
   */
  public function actionDelete($categoryId) {
    // Если была нажата кнопка удаления категории
    if (isset($_POST['submit'])) {
      // Удаляем категорию из БД
      Categories::deleteCategory($categoryId);
      // Редирект на страницу управлениями категориями
      header('Location: /admin/category');
    }
    include(ROOT . '/views/admin/category/delete.php');
    return true;
  }
}
