<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Istok+Web&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/template/css/style.css">
  <title>Регистрация</title>
</head>

<body class="text-center">
<?php if ($result): ?>
    <div class="alert alert-success h3" role="alert">Поздравляем! Вы зарегистрированы!</div>
    <a class="btn btn-primary mt-3" href="/" role="button">Перейти на главную</a>
<?php else: ?>
  <?php if (isset($errors) && is_array($errors)): ?>
    <?php foreach ($errors as $error): ?>
      <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
    <?php endforeach; ?>
  <?php endif; ?>
  <div class="container-fluid">
    <div class="row justify-content-center pt-xl-3">
      <div class="col-12 col-sm-10">
        <form class="form-signin border rounded p-5 mb-5 shadow" action="#" method="post">
          <a href="/" class="navbar-brand brand-wrap m-0">
            <p class="h1 brand-name font-weight-bold mb-4">YourShop</p>
          </a>
          <div class="h5 mb-4 font-weight-normal">Регистрация</div>
          <div class="form-row">
            <div class="form-group col-lg-4">
              <label for="secondName">Фамилия</label>
              <input type="text" class="form-control" id="secondName" placeholder="Фамилия">
            </div>
            <div class="form-group col-lg-4">
              <label for="firstName">Имя*</label>
              <input name="name" type="text" class="form-control" id="firstName" placeholder="Имя" required>
            </div>
            <div class="form-group col-lg-4">
              <label for="patronymic">Отчество</label>
              <input type="text" class="form-control" id="patronymic" placeholder="Отчество">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="inputGender">Пол</label>
              <select id="inputGender" class="form-control">
                <option selected>Мужской</option>
                <option>Женский</option>
                <option>Другое</option>
              </select>
            </div>
            <div class="form-group col-md-5">
              <label for="inputEmail">Email*</label>
              <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" required>
            </div>
            <div class="form-group col-md-5">
              <label for="inputPhone">Телефон</label>
              <input type="tel" class="form-control" id="inputPhone" placeholder="89001234567" pattern="[0-9]{11}">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="pwd">Пароль*</label>
              <input name="password" type="password" class="form-control" id="pwd" placeholder="Пароль" required>
            </div>
            <div class="form-group col-md-6">
              <label for="pwdAgain">Пароль еще раз*</label>
              <input type="password" class="form-control" id="pwdAgain" placeholder="Пароль" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Адрес</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Москва, ул. Мирная, д. 24">
          </div>
          <small class="form-text text-muted text-left">* Звездочкой отмечены поля, обязательные для заполнения.</small>
          <button type="submit" name="submit" class="btn btn-success btn-block mt-4">Зарегистрироваться</button>
        </form>
      </div>
    </div>
  </div>
<?php endif; ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
