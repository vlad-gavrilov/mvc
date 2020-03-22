<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Istok+Web&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/template/css/style.css">
  <title>Магазин</title>
</head>

<body>
  <div id="wrapper">
    <header class="header">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm">
        <a class="navbar-brand" href="/">
          <span class="brand-name font-weight-bold">YourShop</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Главная</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/">Новости</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="/" role="button" data-toggle="dropdown">
                О нас
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/">Блог</a>
                <a class="dropdown-item" href="/">Контакты</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/">История</a>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-3">
              <span class="navbar-text">
                <i class="fas fa-phone"></i>
                +7 800 123 45 67
              </span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/cart">
                <i class="fas fa-shopping-basket"></i>
                Корзина ( <span id="cart-count"><?php echo $this->total['count']; ?></span> )
              </a>
            </li>
            <?php if ($this->isRegistered): ?>
              <li class="userphoto nav-item dropdown pl-3 media d-none d-lg-block">
                <a class="nav-link dropdown-toggle p-0" href="#" role="button" data-toggle="dropdown">
                  <img src="/template/images/frontpage/woman2.jpg" class="rounded-circle" alt="photo" height="38px" width="38px">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="/user">Личный кабинет</a>
                  <a class="dropdown-item" href="/cart">Корзина</a>
                  <a class="dropdown-item" href="/">Доставка</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/user/logout">Выйти</a>
                </div>
              </li>
              <li class="nav-item d-lg-none">
                <a class="nav-link" href="/user/logout">Выйти</a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="/user/login">
                  <i class="fas fa-sign-in-alt"></i>
                  Войти
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </nav>
    </header>
