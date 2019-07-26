<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Интернет-магазин электроники</title>
  <meta name="description" content="Default Description" />
  <meta name="keywords" content="Magento, Varien, E-commerce" />
  <meta name="robots" content="INDEX,FOLLOW" />
  <link rel="icon" href="#" type="image/x-icon" />
  <link rel="shortcut icon" href="#" type="image/x-icon" />

  <!-- CSS =====================================================================================-->
  <link href='http://fonts.googleapis.com/css?family=Telex' rel='stylesheet' type='text/css' />

  <link rel="stylesheet" type="text/css" href="/template/css/styles.css" media="all" />
  <link rel="stylesheet" type="text/css" href="/template/css/skin.css" media="all" />
  <link rel="stylesheet" type="text/css" href="/template/css/cloud-zoom.css" media="all" />
  <link rel="stylesheet" type="text/css" href="/template/css/light_box.css" media="all" />
  <link rel="stylesheet" type="text/css" href="/template/css/mix.css" media="all" />
  <link rel="stylesheet" type="text/css" href="/template/css/banner.css" media="all" />
  <link rel="stylesheet" type="text/css" href="/template/css/magicat.css" media="all" />

  <!-- Scripts =====================================================================================-->
  <script type="text/javascript" src="/template/js/prototype.js"></script>
  <script type="text/javascript" src="/template/js/jquery-1.6.1.min.js"></script>
  <script type="text/javascript" src="/template/js/common.js"></script>
  <script type="text/javascript" src="/template/js/menu.js"></script>
  <script type="text/javascript" src="/template/js/banner_pack.js"></script>
  <script type="text/javascript" src="/template/js/light_box.js"></script>
  <script type="text/javascript" src="/template/js/cloud-zoom.1.0.2.js"></script>
  <script type="text/javascript" src="/template/js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="/template/js/jquery.jcarousel.min.js"></script>
  <script type="text/javascript" src="/template/js/jquery.mix.js"></script>
</head>

<body id="bg_color" class=" cms-index-index cms-home">
  <!--START OF WRAPPER-->
  <div class="wrapper">
    <div class="page">

      <!--START OF HEADER-->
      <div class="header-container">
        <div class="quick-access">
          <!--Start Block Cart-->
          <div class="block block-cart header_cart">
            <div class="block-content_pan">
              <div class="summary trigger-minicart">
                <h2 class="classy"> <span class="cart_icon"><img alt="" src="/template/images/shoppingbag.png" /></span><a href="/cart"><span id="cart-count"><?php echo $this->total['count']; ?></span> товаров</a> </h2>
              </div>
              <?php if ($this->cartItems): ?>
                <div class="remain_cart" id="minicart">
                  <p class="empty">У вас в корзине товары. Вы можете перейти к оформления заказа.</p>
                  <div class="actions">
                    <p class="subtotal"> <span class="label">Сумма: </span> <span class="price">$<?php echo $this->total['cost']; ?></span> </p>
                    <a href="/cart/checkout">
                      <button type="button" title="Оформить заказ" class="button">
                        <span><span>Оформить заказ</span></span>
                      </button>
                    </a>
                  </div>
                </div>
              <?php else: ?>
                <div class="remain_cart" id="minicart">
                  <p class="empty">У вас нет товаров в корзине. Вы можете перейти в каталог товаров.</p>
                  <div class="actions">
                    <p class="subtotal"> <span class="label">Сумма: </span> <span class="price">$<?php echo $this->total['cost']; ?></span> </p>
                    <a href="/">
                      <button type="button" title="Каталог" class="button">
                        <span><span>Каталог</span></span>
                      </button>
                    </a>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <!--End Block Cart-->

          <!--Start Toplinks-->
          <ul class="links">
            <!-- <li><a href="#" title="Заказ" class="top-link-checkout">Заказ</a></li> -->
            <?php if($this->isRegistered): ?>
              <li class="first"><a href="/user" title="<?php echo $this->userInfo['name']; ?>"><?php echo $this->userInfo['name']; ?></a></li>
              <li class=" last"><a href="/user/logout" title="Войти">Выйти</a></li>
            <?php else: ?>
              <!-- <li class="first"><a href="/user" title="Мой аккаунт">Мой аккаунт</a></li> -->
              <li><a href="/user/register" title="Регистрация" class="top-link-checkout">Регистрация</a></li>
              <li class=" last"><a href="/user/login" title="Войти">Войти</a></li>
            <?php endif; ?>
          </ul>
          <!--End Toplinks-->

          <!--Start Language-->
          <div class="form-language">
            <div class="language" id="select-language">
              <a title="English" class="flag" href="#" style="background: url(/template/images/flag_default.gif) no-repeat scroll 0% 0% transparent;">
                English
              </a>
              <a title="French" class="flag" href="#" style="background: url(/template/images/flag_french.gif) no-repeat scroll 0% 0% transparent;">
                French
              </a>
              <a title="German" class="flag" href="#" style="background: url(/template/images/flag_german.gif) no-repeat scroll 0% 0% transparent;">
                German
              </a>
            </div>
          </div>
          <!--End Language-->

          <!--Start Currency-->
          <div class="header_currency">
            <div class="block block-currency">
              <div class="block-content"> <a title="British Pound Sterling" class="currency_icon" style="background: url(/template/images/currency_GBP.gif) no-repeat" href="#">British Pound</a> <a title="Euro" class="currency_icon"
                  style="background:url(/template/images/currency_EUR.gif) no-repeat" href="#">Euro</a> <a title="US Dollar" class="currency_icon selected" style="background: url(/template/images/currency_USD.gif) no-repeat" href="#">US Dollar</a>
              </div>
            </div>
          </div>
          <!--End Currency-->
        </div>

        <!--Start Header Content-->
        <div class="header">
          <ul id="logo">
            <!--Left-->
            <li class="head-container"> <span>{</span>
              <h2 class="classy">Бесплатная доставка при заказе на сумму более $9.99</h2>
              <span>}</span>
              <p class="top-welcome-msg">Добро пожаловать!</p>
            </li>
            <!--Left-->
            <!--Center Logo-->
            <li class="logo-box">
              <h1 class="logo"><strong>Santana Commerce</strong>
                <a href="/" title="Santana Commerce" class="logo">
                  <img src="/template/images/logo.png" alt="Santana Commerce" />
                </a>
              </h1>
            </li>
            <!--Center Logo-->

            <!--Right-->
            <li class="head-container"> <span>{</span>
              <h2 class="classy">Телефон - +7 800 123 45 67</h2>
              <span>}</span>
              <div id="search-bar">
                <div class="top-bar">
                  <form id="search_mini_form" action="">
                    <div class="form-search">
                      <input onfocus="if(this.value=='Search') {this.value=''};" onblur="if(this.value=='') {this.value='Search'};" id="search" name="q" value="Search" class="input-text" type="text" />
                      <button type="submit" title="Go" class="button">Go</button>
                    </div>
                  </form>
                </div>
              </div>
            </li>
            <!--Right-->
          </ul>
          <!--Start of Navigation-->
          <div class="nav-container">
            <ul id="nav">
              <?php foreach ($this->listOfCategories as $key => $category): ?>
                <li><a href="/category/<?php echo $category['id']; ?>"><?php echo $category['name'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <!--End of Navigation-->
        </div>
        <!--End Header Content-->
      </div>
      <!--END OF HEADER-->
