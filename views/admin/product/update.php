<?php require_once(ROOT . '/views/layouts/header_admin.php') ?>

<section>
  <h4>Редактировать товар</h4>
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
          <input type="text" name="name" placeholder="" value="<?php echo $productInfo['name']; ?>">

          <br/>Артикул<br/>
          <input type="text" name="code" placeholder="" value="<?php echo $productInfo['code']; ?>">

          <br/>Стоимость, $<br/>
          <input type="text" name="price" placeholder="" value="<?php echo $productInfo['price']; ?>">

          <br/>Категория<br/>
          <select name="category_id">
            <?php if (is_array($categories)): ?>
              <?php foreach ($categories as $category): ?>
                <?php if ($category['id'] == $productInfo['category_id']): ?>
                  <option value="<?php echo $category['id']; ?>" selected>
                    <?php echo $category['name']; ?>
                  </option>
                <?php else: ?>
                  <option value="<?php echo $category['id']; ?>">
                    <?php echo $category['name']; ?>
                  </option>
                <?php endif; ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>

          <br/>

          <br/>Производитель<br/>
          <input type="text" name="brand" placeholder="" value="<?php echo $productInfo['brand']; ?>">

          <br/>Изображение товара<br/>
          <img src="/upload/images/products/<?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$productInfo['id']}.jpg") ? $productInfo['id'] : 'no-image'; ?>.jpg" alt="product_photo" height="150" width="150"/>
          <br/>
          <input type="file" name="image" placeholder="" value="">

          <br/>Детальное описание<br/>
          <textarea name="description"><?php echo $productInfo['description']; ?></textarea>

          <br/><br/>

          <br/>Наличие на складе<br/>
          <select name="availability">
            <?php if($productInfo['availability']): ?>
              <option value="1" selected="selected">Да</option>
              <option value="0">Нет</option>
            <?php else: ?>
              <option value="1">Да</option>
              <option value="0" selected="selected">Нет</option>
            <?php endif; ?>
          </select>

          <br/>

          <br/>Новинка<br/>
          <select name="is_new">
            <?php if($productInfo['is_new']): ?>
              <option value="1" selected="selected">Да</option>
              <option value="0">Нет</option>
            <?php else: ?>
              <option value="1">Да</option>
              <option value="0" selected="selected">Нет</option>
            <?php endif; ?>
          </select>

          <br/>

          <br/>Рекомендуемые<br/>
          <select name="is_recommended">
            <?php if($productInfo['is_recommended']): ?>
              <option value="1" selected="selected">Да</option>
              <option value="0">Нет</option>
            <?php else: ?>
              <option value="1">Да</option>
              <option value="0" selected="selected">Нет</option>
            <?php endif; ?>
          </select>

          <br/>

          <br/>Статус<br/>
          <select name="status">
            <?php if($productInfo['status']): ?>
              <option value="1" selected="selected">Отображается</option>
              <option value="0">Скрыт</option>
            <?php else: ?>
              <option value="1">Отображается</option>
              <option value="0" selected="selected">Скрыт</option>
            <?php endif; ?>
          </select>

          <br/><br/>

          <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

          <br/>

        </form>
      </div>
  </div>
</section>

<?php require_once(ROOT . '/views/layouts/footer_admin.php') ?>
