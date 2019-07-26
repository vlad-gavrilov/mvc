<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="main-container col2-left-layout">
  <div class="main">

    <!--Page Title-->
    <div class="page-title">
      <h1>Корзина</h1>
    </div>
    <?php if ($cartItems): ?>
    <!--Start of Checkout Steps-->
    <ol class="opc" id="checkoutSteps">
      <?php foreach($cartItems as $id => $product): ?>
      <li id="opc-billing" class="section allow active">
        <div class="step-title">
          <span class="number">
            <?php echo $product['count']; ?>
          </span>
          <h2><?php echo $product['brand']?></h2>
          <h3>$<?php echo $product['price']; ?></h3>
          <h2><?php echo $product['name']?></h2>
          <a href="/cart/delete/<?php echo $product['id']?>" style="display: inline-block;">
            <button type="button" class="button">
              <span><span>Удалить</span></span>
            </button>
          </a>
          <a href="/product/<?php echo $product['id']?>" style="display: inline-block;">
            <button type="button" class="button">
              <span><span>Смотреть товар</span></span>
            </button>
          </a>
        </div>
      </li>
      <hr>
      <?php endforeach; ?>
      <li id="opc-billing" class="section">
        <div class="step-title">
          <h2>Количество товаров</h2>
          <h3><?php echo $total['count']; ?> шт.</h3>
          <h2>Сумма покупки:</h2>
          <h3>$<?php echo $total['cost']; ?></h3>
        </div>
      </li>
    </ol>
    <a href="/cart/checkout" style="display: inline-block;">
      <button type="button" class="button">
        <span><span>Оформить заказ</span></span>
      </button>
    </a>
    <!--End of Checkout Steps-->
  <?php else: ?>
      <h2 align="center">У вас нет товаров в корзине</h2>
  <?php endif; ?>
  </div>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
