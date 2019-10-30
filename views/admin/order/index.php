<?php require_once(ROOT . '/views/layouts/header_admin.php') ?>

<div class="content container-fluid">
  <div class="row py-3">
    <div class="container-fluid table-responsive">
      <table class="table table-sm table-bordered table-hover">
        <thead>
          <tr class="text-center">
            <th scope="col" class="align-middle">#</th>
            <th scope="col" class="align-middle">Заказчик</th>
            <th scope="col" class="align-middle">Телефон</th>
            <th scope="col" class="align-middle">Комментарий</th>
            <th scope="col" class="align-middle">id заказчика</th>
            <th scope="col" class="align-middle">Дата заказа</th>
            <th scope="col" class="align-middle">Товары</th>
            <th scope="col" class="align-middle">Статус</th>
            <th scope="col" class="align-middle">Смотреть</th>
            <!-- <th scope="col" class="align-middle">Редактировать</th> -->
            <th scope="col" class="align-middle">Удалить</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($ordersList as $order): ?>
          <tr class="text-center">
            <?php foreach ($order as $key => $value): ?>
              <td class="align-middle">
                <?php
                 if($key == "name") echo "<b>";
                 echo $value;
                 if($key == "name") echo "</b>";
                ?>
              </td>
            <?php endforeach; ?>
            <td class="align-middle"><a type="button" class="btn btn-block btn-success" href="/admin/order/view/<?php echo $order['id']?>"><i class="fas fa-eye"></i></a></td>
            <!-- <td class="align-middle"><a type="button" class="btn btn-block btn-warning" href="/admin/order/update/<?php echo $order['id']?>"><i class="far fa-edit"></i></a></td> -->
            <td class="align-middle"><a type="button" class="btn btn-block btn-danger" href="/admin/order/delete/<?php echo $order['id']?>"><i class="fas fa-times"></i></a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php require_once(ROOT . '/views/layouts/footer_admin.php') ?>
