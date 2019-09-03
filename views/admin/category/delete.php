<?php require_once(ROOT . '/views/layouts/header_admin.php') ?>

<div class="content container-fluid">
  <div class="col pt-3">
    <div class="h5 mb-4 text-center">Удалить категорию #<?php echo $categoryId; ?></div>
    <hr>
    <p class="text-center">Вы действительно хотите удалить эту категорию?</p>
    <form method="post">
      <div class="row">
        <div class="col-12"><button type="submit" name="submit" class="btn btn-danger btn-block">Удалить</button></div>
      </div>
    </form>
  </div>
</div>

<?php require_once(ROOT . '/views/layouts/footer_admin.php') ?>
