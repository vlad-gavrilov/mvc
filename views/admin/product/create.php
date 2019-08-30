<?php require_once(ROOT . '/views/layouts/header_admin.php') ?>

<div class="content container-fluid">
  <?php if (isset($errors) && is_array($errors)): ?>
    <?php foreach ($errors as $error): ?>
      <div class="alert alert-danger mt-1" role="alert"><?php echo $error; ?></div>
    <?php endforeach; ?>
  <?php endif; ?>
  <div class="col pt-3">
    <form class="" action="#" method="post" enctype="multipart/form-data">
      <div class="h5 mb-4 font-weight-normal">Создание нового товара</div>
      <div class="form-row">
        <div class="form-group col-lg-12">
          <label for="name">Название товара</label>
          <input type="text" class="form-control" id="name" name="name" value="">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-lg-4">
          <label for="code">Артикул</label>
          <input type="text" class="form-control" id="code" name="code" value="">
        </div>
        <div class="form-group col-lg-4">
          <label for="price">Стоимость, $</label>
          <input type="text" class="form-control" id="price" name="price" value="">
        </div>
        <div class="form-group col-lg-4">
          <label for="category_id">Категория</label>
          <select id="category_id" class="form-control" name="category_id">
            <?php if (is_array($categories)): ?>
              <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>" selected>
                  <?php echo $category['name']; ?>
                </option>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-lg-12">
          <label for="brand">Производитель</label>
          <input type="text" class="form-control" id="brand" name="brand" value="">
        </div>
      </div>
      <div class="form-group">
        <label for="image">Изображение товара</label>
        <input type="file" class="form-control-file" id="image" name="image">
      </div>
      <div class="form-group">
        <label for="description">Описание товара</label>
        <textarea class="form-control" id="description" rows="4" name="description"></textarea>
      </div>
      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="availability">Наличие на складе</label>
          <select id="availability" class="form-control" name="availability">
            <option value="1" selected>Да</option>
            <option value="0">Нет</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="isNew">Новинка</label>
          <select id="isNew" class="form-control" name="is_new">
            <option value="1" selected>Да</option>
            <option value="0">Нет</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="isRecommended">Рекомендуемые</label>
          <select id="isRecommended" class="form-control" name="is_recommended">
            <option value="1">Да</option>
            <option value="0" selected>Нет</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="status">Статус</label>
          <select id="status" class="form-control" name="status">
            <option value="1" selected>Отображается</option>
            <option value="0">Скрыт</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-12"><button type="submit" class="btn btn-success btn-block my-4" name="submit">Сохранить изменения</button></div>
      </div>
    </form>
  </div>
</div>

<?php require_once(ROOT . '/views/layouts/footer_admin.php') ?>
