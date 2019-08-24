<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="content container-fluid">
  <div class="row">
    <div class="col-12 col-lg-2 border-right">
      <nav class="nav flex-column pt-3">
        <?php foreach ($this->listOfCategories as $key => $category): ?>
          <a class="nav-link text-uppercase" href="/category/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
        <?php endforeach; ?>
      </nav>
    </div>
    <div class="col-12 col-lg-10">
      <div class="container pb-3">
        <div class="row text-left pt-3">
          <div class="col">
            <h5 class="font-weight-bold pt-3"><?php echo $categoryItem['name']; ?></h5>
          </div>
          <div class="col">
            <div class="row pb-3 justify-content-end">
              <form class="form-inline d-flex flex-row bd-highlight mb-3 pr-3">
                <label class="my-1 mr-2" for="show">Показывать по </label>
                <select class="custom-select my-1 mr-sm-2" id="show">
                  <option value="6" selected>6</option>
                  <option value="9">9</option>
                  <option value="15">15</option>
                  <option value="30">30</option>
                </select>
                <button type="submit" class="btn btn-secondary my-1">Показать</button>
              </form>
            </div>
          </div>
        </div>
        <?php $i= 0; foreach($productList as $key => $product): ?>
          <?php if ($i % 3 == 0): ?>
            <div class="row pb-3">
          <?php endif; ?>
          <div class="col-md-4 mb-1">
            <div class="card">
              <img src="/upload/images/products/<?php echo $product['id']; ?>.jpg" alt="" class="card-img-top p-3" height="250">
              <div class="card-body">
                <p class="card-text font-weight-bold"><?php echo $product['name']; ?></p>
                <span class="font-weight-bold">
                  <h2>$<?php echo $product['price']; ?></h2>
                </span>
                <hr class="w-100">
                <div class="d-flex flex-column flex-xl-row justify-content-between">
                  <a href="/product/<?php echo $product['id']; ?>" class="btn btn-secondary mb-1 mb-xl-0"><i class="fas fa-eye"></i> Посмотреть</a>
                  <a href="/cart/add/<?php echo $product['id']; ?>" class="btn btn-success add-to-cart" data-id="<?php echo $product['id']; ?>"><i class="fas fa-shopping-basket"></i> В корзину</a>
                </div>
              </div>
            </div>
          </div>
          <?php if (($i + 1) % 3 == 0): ?>
            </div>
          <?php endif; ?>
        <?php $i++; endforeach; ?>
        <?php if ($i % 3 != 0): ?>
          </div>
        <?php endif; ?>
        <div class="row justify-content-center py-1">
          <div class="customPagination">
            <nav>
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#"><span>&laquo;</span></a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item disabled"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#"><span>&raquo;</span></a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
