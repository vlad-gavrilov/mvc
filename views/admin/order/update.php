<?php require_once(ROOT . '/views/layouts/header_admin.php') ?>

<div class="content container-fluid py-3">
  <div class="row mb-3">
    <div class="col">
      <div class="h5 mb-4 font-weight-normal">Редактирование заказа</div>
      <?php if (isset($errors) && is_array($errors)): ?>
        <?php foreach ($errors as $error): ?>
          <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
        <?php endforeach; ?>
      <?php endif; ?>
      <form action="#" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="user_name">Имя заказчика</label>
            <input type="text" name="user_name" class="form-control" id="user_name" value="<?php echo $orderInfo['user_name']; ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="user_phone">Телефон</label>
            <input type="tel" name="user_phone" class="form-control" id="user_phone" value="<?php echo $orderInfo['user_phone']; ?>" placeholder="88001234567" pattern="[0-9]{11}">
          </div>
        </div>
        <div class="form-group">
          <label for="user_comment">Комментарий к заказу</label>
          <textarea class="form-control" name="user_comment" id="user_comment" rows="4"><?php echo $orderInfo['user_comment']; ?></textarea>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="status">Статус</label>
            <select id="status" class="form-control" name="status">
              <option value="1" <?php if($orderInfo['status'] == 1) echo "selected"; ?>>Принят в обработку</option>
              <option value="2" <?php if($orderInfo['status'] == 2) echo "selected"; ?>>Доставляется</option>
              <option value="3" <?php if($orderInfo['status'] == 3) echo "selected"; ?>>Выполнен</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col"><button type="submit" name="submit" class="btn btn-success btn-block">Сохранить</button></div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once(ROOT . '/views/layouts/footer_admin.php'); ?>
