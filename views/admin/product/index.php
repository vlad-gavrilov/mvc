<?php require_once(ROOT . '/views/layouts/header_admin.php') ?>

<div class="content container-fluid">
  <div class="row py-3">
    <div class="container-fluid mb-3">
      <div class="row">
        <div class="col">
          <a href="/admin/product/create">
            <button type="button" class="btn btn-block btn-primary">Добавить товар</button>
          </a>
        </div>
      </div>
    </div>
    <div class="container-fluid table-responsive">
      <table class="table table-sm table-bordered table-hover">
        <thead>
          <tr class="text-center">
            <th scope="col" class="align-middle">#</th>
            <th scope="col" class="align-middle">Название</th>
            <th scope="col" class="align-middle">Категория</th>
            <th scope="col" class="align-middle">Код</th>
            <th scope="col" class="align-middle">Цена</th>
            <th scope="col" class="align-middle">Наличие</th>
            <th scope="col" class="align-middle">Бренд</th>
            <th scope="col" class="align-middle">Новинка</th>
            <th scope="col" class="align-middle">Рек</th>
            <th scope="col" class="align-middle">Статус</th>
            <th scope="col" class="align-middle">Редактировать</th>
            <th scope="col" class="align-middle">Удалить</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($productsList as $product): ?>
          <tr class="text-center">
            <?php foreach ($product as $key => $value): ?>
              <td class="align-middle">
                <?php
                 if($key == "name") echo "<b>";
                 echo $value;
                 if($key == "name") echo "</b>";
                ?>
              </td>
            <?php endforeach; ?>
            <td class="align-middle"><a type="button" class="btn btn-block btn-warning" href="/admin/product/update/<?php echo $product['id']?>">Редактировать</a></td>
            <td class="align-middle"><a type="button" class="btn btn-block btn-danger" href="/admin/product/delete/<?php echo $product['id']?>">Удалить</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php require_once(ROOT . '/views/layouts/footer_admin.php') ?>
