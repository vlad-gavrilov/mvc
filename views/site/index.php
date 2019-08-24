<?php include_once(ROOT . '/views/layouts/header.php'); ?>
<div class="content container-fluid">
  <p class="text-center m-0">
    <a class="navbar-brand brand-wrap" href="/">
      <span class="brand-name font-weight-bold">YourShop</span>
    </a>
  </p>
  <nav class="categories row nav nav-pills nav-justified border-top border-bottom mb-3">
  <?php foreach ($this->listOfCategories as $key => $category): ?>
    <div class="col-12 col-sm-6 col-lg-3">
      <a class="nav-item nav-link" href="/category/<?php echo $category['id']; ?>">
        <div class="text-left text-lg-center">
          <i class="fas fa-laptop"></i>
          <?php echo $category['name'] ?>
        </div>
      </a>
    </div>
  <?php endforeach; ?>
  </nav>
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-12">
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2" class="active"></li>
            <li data-target="#carousel" data-slide-to="3"></li>
            <li data-target="#carousel" data-slide-to="4"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item ">
              <img src="template/images/frontpage/laptop2.jpg" class="d-block w-100" alt="laptop">
            </div>
            <div class="carousel-item">
              <img src="template/images/frontpage/graphics2.jpg" class="d-block w-100" alt="tablet">
            </div>
            <div class="carousel-item active">
              <img src="template/images/frontpage/tablet2.jpg" class="d-block w-100" alt="server">
            </div>
            <div class="carousel-item">
              <img src="template/images/frontpage/code2.jpg" class="d-block w-100" alt="code">
            </div>
            <div class="carousel-item">
              <img src="template/images/frontpage/server2.jpg" class="d-block w-100" alt="graphics">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-12 col-lg-4 pb-1"><img src="template/images/frontpage/code.jpg" class="rounded img-fluid" alt="..."></div>
      <div class="col-12 col-lg-4 pb-1"><img src="template/images/frontpage/tablet.jpg" class="rounded img-fluid" alt="..."></div>
      <div class="col-12 col-lg-4 pb-1"><img src="template/images/frontpage/graphics.jpg" class="rounded img-fluid" alt="..."></div>
    </div>
  </div>
  <hr>
  <figure class="p-0">
    <div class="fixed-wrap">
      <div id="fixed">
      </div>
    </div>
  </figure>
  <div class="container-fluid padding">
    <div class="row alert text-center">
      <div class="col-12">
        <h5>Рекомендованные товары</h5>
      </div>
    </div>
  </div>
  <hr>
  <div class="container pb-3">
    <?php for ($i = 0; $i < 6; $i++): ?>
      <?php if ($i % 3 == 0): ?>
        <div class="row pb-3">
      <?php endif; ?>

      <div class="col-md-4 mb-1">
        <div class="card">
          <img src="/upload/images/products/<?php echo $latestList[$i]['id']; ?>.jpg" alt="" class="card-img-top p-3" height="250">
          <div class="card-body">
            <!-- <h4 class="card-title"><?php echo $latestList[$i]['name']; ?></h4> -->
            <p class="card-text font-weight-bold"><?php echo $latestList[$i]['name']; ?></p>
            <span class="font-weight-bold">
              <h2>$<?php echo $latestList[$i]['price']; ?></h2>
            </span>
            <hr class="w-100">
            <div class="d-flex flex-column flex-xl-row justify-content-between">
              <a href="/product/<?php echo $latestList[$i]['id']; ?>" class="btn btn-secondary mb-1 mb-xl-0"><i class="fas fa-eye"></i> Посмотреть</a>
              <a href="/cart/add/<?php echo $latestList[$i]['id']; ?>" class="btn btn-success"><i class="fas fa-shopping-basket"></i> В корзину</a>
            </div>
          </div>
        </div>
      </div>

      <?php if (($i + 1) % 3 == 0): ?>
        </div>
      <?php endif; ?>
    <?php endfor; ?>
  </div>
</div>
</div>
<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
