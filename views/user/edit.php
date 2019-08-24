<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="content container-fluid py-3">
    <div class="row mb-3">
      <div class="col">
      <?php if ($result): ?>
        <div class="alert alert-success" role="alert">Данные успешно изменены!</div>
      <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
          <?php foreach ($errors as $error): ?>
            <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
          <?php endforeach; ?>
        <?php endif; ?>
        <form class="" action="#" method="post">
          <div class="h5 mb-4 font-weight-normal">Редактирование данных пользователя</div>
          <div class="form-row">
            <div class="form-group col-lg-12">
              <label for="firstName">Новое имя</label>
              <input name="name" type="text" class="form-control" id="firstName" value="<?php echo $this->userInfo['name'] ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputEmail">Новый email</label>
              <input name="email" type="email" class="form-control" id="inputEmail" value="<?php echo $this->userInfo['email'] ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="pwd">Новый пароль</label>
              <input name="password" type="password" class="form-control" id="pwd">
            </div>
            <div class="form-group col-md-6">
              <label for="pwdAgain">Новый пароль еще раз</label>
              <input type="password" class="form-control" id="pwdAgain" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-6"><a class="btn btn-danger btn-block mt-4" href="/user/edit" role="button">Сбросить</a></div>
            <div class="col-12 col-md-6"><button name="submit" type="submit" class="btn btn-success btn-block mt-4">Сохранить изменения</button></div>
          </div>
        </form>
      <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
