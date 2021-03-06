<?php require_once(ROOT . '/views/layouts/header_admin.php') ?>

<div class="content container-fluid">
  <?php if (isset($errors) && is_array($errors)): ?>
    <?php foreach ($errors as $error): ?>
      <div class="alert alert-danger mt-1" role="alert"><?php echo $error; ?></div>
    <?php endforeach; ?>
  <?php endif; ?>
  <div class="col pt-3">
    <form class="" action="#" method="post">
      <div class="h5 mb-4 font-weight-normal">Редактирование категории</div>
      <div class="form-row">
        <div class="form-group col-lg-12">
          <label for="name">Название категории</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $categoryInfo['name']; ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="sort_order">Сортировка</label>
          <input type="text" class="form-control" id="sort_order" name="sort_order" value="<?php echo htmlspecialchars($categoryInfo['sort_order']); ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="status">Статус</label>
          <select id="status" class="form-control" name="status">
            <option value="1" <?php if($categoryInfo['status'] == 1) echo "selected"; ?>>Активная</option>
            <option value="0" <?php if($categoryInfo['status'] == 0) echo "selected"; ?>>Деактивированная</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-lg-12">
          <label for="logo">Логотип категории</label>
          <select id="logo" class="form-control" name="logo">
            <option value="fas fa-laptop" <?php if($categoryInfo['logo'] == "fas fa-laptop") echo "selected"; ?>>laptop</option>
            <option value="fas fa-tablet-alt" <?php if($categoryInfo['logo'] == "fas fa-tablet-alt") echo "selected"; ?>>tablet</option>
            <option value="far fa-keyboard" <?php if($categoryInfo['logo'] == "far fa-keyboard") echo "selected"; ?>>keyboard</option>
            <option value="fas fa-headphones" <?php if($categoryInfo['logo'] == "fas fa-headphones") echo "selected"; ?>>headphones</option>
            <option value="fas fa-shopping-basket" <?php if($categoryInfo['logo'] == "fas fa-shopping-basket") echo "selected"; ?>>shopping-basket</option>
            <option value="far fa-hdd" <?php if($categoryInfo['logo'] == "far fa-hdd") echo "selected"; ?>>hdd</option>
            <option value="fas fa-tv" <?php if($categoryInfo['logo'] == "fas fa-tv") echo "selected"; ?>>tv</option>
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
