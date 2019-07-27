<?php require_once(ROOT . '/views/layouts/header_admin.php') ?>

<section>
  <h4>Список товаров</h4>
  <br/>
  <table border="1">
    <tr>
      <th><b>ID товара</b></th>
      <th><b>Название товара</b></th>
      <th><b>Категория</b></th>
      <th><b>Код</b></th>
      <th><b>Цена</b></th>
      <th><b>Наличие</b></th>
      <th></th>
      <th></th>
    </tr>

    <?php foreach ($productsList as $product): ?>
    <tr>
      <?php foreach ($product as $key => $value): ?>
        <td>
          <?php echo $value; ?>
        </td>
      <?php endforeach; ?>
      <td>
        <a href="/admin/product/update/<?php echo $product['id']?>">Редактировать</a>
      </td>
      <td>
        <a href="/admin/product/delete/<?php echo $product['id']?>">Удалить</a>
      </td>
    <?php endforeach; ?>
  </table>
  <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>
</section>

<?php require_once(ROOT . '/views/layouts/footer_admin.php') ?>
