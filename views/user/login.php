<?php include_once(ROOT . '/views/layouts/header.php'); ?>
<div class="main-container col2-left-layout">
  <div class="main">
    <?php if (isset($errors) && is_array($errors)): ?>
      <ul>
          <?php foreach ($errors as $error): ?>
              <li><?php echo $error; ?></li>
          <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <div class="signup-form"><!--sign up form-->
        <h1 align="center">Вход на сайт</h1>
        <div align="center">
          <form action="#" method="post">

            <input name="email" placeholder="E-mail" value="<?php echo $userData['email']; ?>"/><br>
            <input type="password" name="password" placeholder="Пароль" value="<?php echo $userData['password']; ?>"/><br>
            <input type="submit" name="submit" class="btn btn-default" value="Вход" />
          </form>
        </div>
    </div><!--/sign up form-->
  </div>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
