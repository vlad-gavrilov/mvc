<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="content container-fluid py-3">
<?php if ($cartItems): ?>
<div class="row mb-3">
  <div class="col">
    <div class="h5 mb-4 font-weight-normal">Корзина</div>
    <table class="table table-bordered table-hover table-responsive-md">
      <thead>
        <tr class="text-center">
          <th scope="col">Название товара</th>
          <th scope="col">Количество, шт.</th>
          <th scope="col">Цена, $</th>
          <th scope="col">Суммарная стоимость, $</th>
          <th scope="col">Смотртеть товар</th>
          <th scope="col">Удалить</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($cartItems as $id => $product): ?>
          <tr>
            <th scope="row"><?php echo $product['name']; ?></th>
            <td class="text-center"><?php echo $product['count']; ?></td>
            <td class="text-center"><?php echo $product['price']; ?></td>
            <td class="text-center"><?php echo $product['count'] * $product['price']; ?></td>
            <td class="text-center position-relative"><a href="/product/<?php echo $product['id']; ?>" class="stretched-link"><i class="fas fa-eye text-info"></i></a></td>
            <td class="text-center position-relative"><a href="/cart/delete/<?php echo $product['id']?>" class="stretched-link"><i class="far fa-trash-alt text-danger"></i></a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<p class="mb-0">Выбрано товаров: <span class="font-weight-bold"><?php echo $total['count']; ?> шт.</span></p>
<p>На сумму: <span class="font-weight-bold"><?php echo $total['cost']; ?> $</span></p>
<div class="row">
  <div class="col"><a href="/cart/checkout" class="btn btn-success btn-block">Оформить заказ</a></div>
</div>
<?php else: ?>
  <p class="h3 text-center">У вас нет товаров в корзине</p>
<?php endif; ?>
  </div>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
