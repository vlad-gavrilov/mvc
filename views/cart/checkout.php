<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="content container-fluid py-3">
  <div class="row mb-3">
    <div class="col">
<?php if ($result): ?>
  <p class="h3 text-center">Заказ оформлен.</p>
<?php else: ?>
  <div class="h5 mb-4 font-weight-normal">Оформление заказа</div>
  <?php if (isset($errors) && is_array($errors)): ?>
    <?php foreach ($errors as $error): ?>
      <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
    <?php endforeach; ?>
  <?php endif; ?>
  <form action="#" method="post">
    <div class="form-row">
      <div class="form-group col-lg-12">
        <label for="firstName">Имя</label>
        <input type="text" name="userName" class="form-control" id="firstName" value="<?php if ($this->isRegistered) echo $this->userInfo['name'] ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input type="email" name="userEmail" class="form-control" id="inputEmail" value="<?php if ($this->isRegistered) echo $this->userInfo['email'] ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPhone">Телефон</label>
        <input type="tel" name="userPhone" class="form-control" id="inputPhone" value="" placeholder="88001234567" pattern="[0-9]{11}">
      </div>
    </div>
    <div class="form-group">
      <label for="comment">Комментарий к заказу</label>
      <textarea class="form-control" name="userComment" id="comment" rows="4"></textarea>
    </div>
    <p class="mb-0">Выбрано товаров: <span class="font-weight-bold"><?php echo $total['count']; ?> шт.</span></p>
    <p>На сумму: <span class="font-weight-bold"><?php echo $total['cost']; ?> $</span></p>
    <div class="row">
      <div class="col"><button type="submit" name="submit" class="btn btn-success btn-block">Оформить</button></div>
    </div>
  </form>
<?php endif; ?>
    </div>
  </div>
</div>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
