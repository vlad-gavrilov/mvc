<?php require_once(ROOT . '/views/layouts/header_admin.php') ?>

<div class="content container-fluid py-3">
  <div class="col pt-3">
    <p>ID заказа: <b><?php echo $orderInfo['id']; ?></b></p>
    <p>Заказчик: <b><?php echo $orderInfo['user_name']; ?></b></p>
    <p>Телефон: <b><?php echo $orderInfo['user_phone']; ?></b></p>
    <p>Комментарий: <b><?php echo $orderInfo['user_comment']; ?></b></p>
    <p>ID пользователя: <b><?php echo $orderInfo['user_id']; ?></b></p>
    <p>Дата: <b><?php echo $orderInfo['date']; ?></b></p>
    <p>Статус: <b><?php echo $orderInfo['status']; ?></b></p>
    <table class="table table-sm table-bordered table-hover">
      <thead>
        <tr class="text-center">
          <th scope="col" class="align-middle">ID товара</th>
          <th scope="col" class="align-middle">Название</th>
          <th scope="col" class="align-middle">Категория</th>
          <th scope="col" class="align-middle">Код</th>
          <th scope="col" class="align-middle">Цена</th>
          <th scope="col" class="align-middle">Наличие</th>
          <th scope="col" class="align-middle">Количество</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($listOfOrderedProducts as $productId => $info): ?>
        <tr class="text-center">
          <td class="align-middle">
            <?php echo $productId; ?>
          </td>
          <?php foreach ($info as $key => $value): ?>
            <td class="align-middle">
              <?php echo $value; ?>
            </td>
          <?php endforeach; ?>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <a href="/admin/order/update/<?php echo $orderInfo['id']?>"><button type="button" class="btn btn-block btn-warning">Редактировать заказ</button></a>
  </div>
</div>

<?php require_once(ROOT . '/views/layouts/footer_admin.php') ?>
