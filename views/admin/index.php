<?php require_once(ROOT . '/views/layouts/header_admin.php') ?>

<div class="content container-fluid">
  <div class="row">
    <nav class="d-none d-lg-block col-lg-2 border-right" id="fixed-menu">
      <ul class="nav flex-column mt-3">
        <li class="nav-item">
          <a class="nav-link active" href="/admin">
            <i class="fas fa-home" style="width: 25px;"></i>
            Главная
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/product">
            <i class="fas fa-gift" style="width: 25px;"></i>
            Товары
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/category">
            <i class="fas fa-sliders-h" style="width: 25px;"></i>
            Категории
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/order">
            <i class="fas fa-shipping-fast" style="width: 25px;"></i>
            Заказы
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-users" style="width: 25px;"></i>
            Пользователи
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="far fa-newspaper" style="width: 25px;"></i>
            Отчеты
          </a>
        </li>
      </ul>
    </nav>
    <main class="col-lg-10 ml-sm-auto px-3">
      <div class="container-fluid">
        <div class="pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Администрация</h1>
        </div>
        <div class="pt-3 pb-2 mb-3">
          <h4>Добрый день, администратор!</h4>
          <p>Вам доступны такие возможности:</p>
          <ul>
            <li><a href="/admin/product">Управление товарами</a></li>
            <li><a href="/admin/category">Управление категориями</a></li>
            <li><a href="/admin/order">Управление заказами</a></li>
          </ul>
        </div>
      </div>
    </main>
  </div>
</div>

<?php require_once(ROOT . '/views/layouts/footer_admin.php') ?>
