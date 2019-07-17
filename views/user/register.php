<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="main-container col2-left-layout">
  <div class="main">
    <?php if ($result): ?>
        <p>Вы зарегистрированы!</p>
    <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div class="signup-form"><!--sign up form-->
            <h1 align="center">Регистрация на сайте</h1>
            <div align="center">
              <form action="#" method="post">
                <input type="text" name="name" placeholder="Имя" value="<?php echo $userData['name']; ?>"/><br>
                <input name="email" placeholder="E-mail" value="<?php echo $userData['email']; ?>"/><br>
                <input type="password" name="password" placeholder="Пароль" value="<?php echo $userData['password']; ?>"/><br>
                <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />
              </form>
            </div>
        </div><!--/sign up form-->
    <?php endif; ?>
  </div>
</div>
<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
