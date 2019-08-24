<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="content container-fluid py-3">
  <div class="row mb-3 justify-content-center mx-3">
    <div class="col-12 col-lg-3 border p-3">
      <p class="h2 pb-5">Личный кабинет</p>
      <div class="h5 mb-4 font-weight-normal">Добро пожаловать, <span class="font-weight-bold"><?php echo $userData['name']; ?></span>!</div>
      <p>ФИО: <span class="font-weight-bold"><?php echo $userData['name']; ?></span></p>
      <p>id: <span class="font-weight-bold"><?php echo $userData['id']; ?></span></p>
      <p>Email: <span class="font-weight-bold"><?php echo $userData['email']; ?></span></p>
      <p>Права администратора: <span class="font-weight-bold"><?php echo $userData['role'] ? "есть" : "нет"; ?></span></p>
      <a href="/user/edit" class="btn btn-info btn-block mt-4">Редактировать данные</a>
    </div>
  </div>
</div>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
