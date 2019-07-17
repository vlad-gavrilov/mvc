<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="main-container col2-left-layout">
  <div class="main">

    <?php if ($result): ?>
        <p>Данные успешно изменены!</p>
    <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div class="signup-form"><!--sign up form-->
            <h1 align="center">Редактирование данных</h1>
            <div align="center">
              <form action="#" method="post">
                <input type="text" name="name" placeholder="Введите новое мия" value=""/><br>
                <input name="email" placeholder="Введите новый e-mail" value=""/><br>
                <input type="password" name="password" placeholder="Введите новый пароль" value=""/><br>
                <input type="submit" name="submit" class="btn btn-default" value="Редактировать" />
              </form>
            </div>
        </div><!--/sign up form-->
    <?php endif; ?>

  </div>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
