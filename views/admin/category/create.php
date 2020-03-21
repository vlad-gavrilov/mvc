<?php require_once(ROOT . '/views/layouts/header_admin.php') ?>

<div class="content container-fluid">
  <?php if (isset($errors) && is_array($errors)): ?>
    <?php foreach ($errors as $error): ?>
      <div class="alert alert-danger mt-1" role="alert"><?php echo $error; ?></div>
    <?php endforeach; ?>
  <?php endif; ?>
  <div class="col pt-3">
    <form class="" action="#" method="post">
      <div class="h5 mb-4 font-weight-normal">Создание новой категории</div>
      <div class="form-row">
        <div class="form-group col-lg-12">
          <label for="name">Название категории</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="sort_order">Сортировка</label>
          <input type="text" class="form-control" id="sort_order" name="sort_order">
        </div>
        <div class="form-group col-md-6">
          <label for="status">Статус</label>
          <select id="status" class="form-control" name="status">
            <option value="1" selected>Активная</option>
            <option value="0">Деактивированная</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-lg-12">
          <label for="logo">Логотип категории</label>
          <select id="logo" class="form-control" name="logo">
            <option value="fas fa-laptop">laptop</option>
            <option value="fas fa-tablet-alt">tablet</option>
            <option value="far fa-keyboard">keyboard</option>
            <option value="fas fa-headphones">headphones</option>
            <option value="fas fa-shopping-basket">shopping-basket</option>
            <option value="far fa-hdd">hdd</option>
            <option value="fas fa-tv">tv</option>
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
