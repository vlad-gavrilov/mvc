<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<section>
    <div class="container">
        <div class="row">
          <div class="col-sm-9 padding-right">
              <div class="features_items">
                  <h2 class="title text-center">Оформление заказа</h2>
                  <?php if ($result): ?>
                      <p>Заказ оформлен.</p>
                  <?php else: ?>

                      <p>Выбрано товаров: <?php echo $total['count']; ?><br/>На сумму: $<?php echo $total['cost']; ?></p><br/>

                      <?php if (!$result): ?>

                          <div class="col-sm-4">
                              <?php if (isset($errors) && is_array($errors)): ?>
                                  <ul>
                                      <?php foreach ($errors as $error): ?>
                                          <li> - <?php echo $error; ?></li>
                                      <?php endforeach; ?>
                                  </ul>
                              <?php endif; ?>

                              <p>Для оформления заказа заполните форму.</p>

                              <div class="login-form">
                                  <form action="#" method="post">
                                      Ваше имя
                                      <p><input type="text" name="userName" placeholder="" value="<?php echo $userName; ?>"/></p>
                                      Номер телефона
                                      <p><input type="text" name="userPhone" placeholder="" value="<?php echo $userPhone; ?>"/></p>
                                      Комментарий к заказу
                                      <p><input type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>"/></p>
                                      <input type="submit" name="submit" class="btn btn-default" value="Оформить" />
                                  </form>
                              </div>
                          </div>

                      <?php endif; ?>

                  <?php endif; ?>

              </div>
          </div>
        </div>
    </div>
</section>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
