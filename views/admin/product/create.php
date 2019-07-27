<?php require_once(ROOT . '/views/layouts/header_admin.php') ?>

<section>
  <h4>Добавить новый товар</h4>
  <br/>
  <?php if (isset($errors) && is_array($errors)): ?>
      <ul>
          <?php foreach ($errors as $error): ?>
              <li> - <?php echo $error; ?></li>
          <?php endforeach; ?>
      </ul>
  <?php endif; ?>

  <div class="col-lg-4">
    <div class="login-form">
        <form action="#" method="post" enctype="multipart/form-data">

          <br/>Название товара<br/>
          <input type="text" name="name" placeholder="" value="">

          <br/>Артикул<br/>
          <input type="text" name="code" placeholder="" value="">

          <br/>Стоимость, $<br/>
          <input type="text" name="price" placeholder="" value="">

          <br/>Категория<br/>
          <select name="category_id">
              <?php if (is_array($categories)): ?>
                  <?php foreach ($categories as $category): ?>
                      <option value="<?php echo $category['id']; ?>">
                          <?php echo $category['name']; ?>
                      </option>
                  <?php endforeach; ?>
              <?php endif; ?>
          </select>

          <br/>

          <br/>Производитель<br/>
          <input type="text" name="brand" placeholder="" value="">

          <br/>Изображение товара<br/>
          <input type="file" name="image" placeholder="" value="">

          <br/>Детальное описание<br/>
          <textarea name="description"></textarea>

          <br/><br/>

          <br/>Наличие на складе<br/>
          <select name="availability">
              <option value="1" selected="selected">Да</option>
              <option value="0">Нет</option>
          </select>

          <br/>

          <br/>Новинка<br/>
          <select name="is_new">
              <option value="1" selected="selected">Да</option>
              <option value="0">Нет</option>
          </select>

          <br/>

          <br/>Рекомендуемые<br/>
          <select name="is_recommended">
              <option value="1" selected="selected">Да</option>
              <option value="0">Нет</option>
          </select>

          <br/>

          <br/>Статус<br/>
          <select name="status">
              <option value="1" selected="selected">Отображается</option>
              <option value="0">Скрыт</option>
          </select>

          <br/><br/>

          <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

          <br/>

        </form>
      </div>
  </div>
</section>

<?php require_once(ROOT . '/views/layouts/footer_admin.php') ?>
