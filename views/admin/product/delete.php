<?php require_once(ROOT . '/views/layouts/header_admin.php') ?>

<section>
  <h4>Удалить товар #<?php echo $productId; ?></h4>
  <p>Вы действительно хотите удалить этот товар?</p>
  <form method="post">
      <input type="submit" name="submit" value="Удалить" />
  </form>
</section>

<?php require_once(ROOT . '/views/layouts/footer_admin.php') ?>
