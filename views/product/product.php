<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="content container-fluid pt-3">
  <div class="row">
    <div class="col-12 col-lg-5">
      <img src="/upload/images/products/<?php echo $product["id"]; ?>.jpg" class="img-thumbnail p-3" alt="товар" width="100%">
    </div>
    <div class="col-12 col-lg-7 p-3">
      <h2 class="h5"><?php echo $product["name"]; ?></h2>
      <div class="row justify-content-between">
        <div class="col-12 col-lg-3"><span class="font-weight-bold h4">$<?php echo $product["price"]; ?></span></div>
        <?php if ($product["availability"]): ?>
          <div class="col-3"><span class="font-italic h5 text-success">На складе</span></div>
        <?php else: ?>
          <div class="col-12 col-lg-3"><span class="font-italic h5 text-danger">Отсутствует</span></div>
        <?php endif; ?>
      </div>
      <hr class="w-75">
      <div class="row pb-3">
        <div class="col">
          <div class="h5">Описание</div>
          <?php echo $product["description"]; ?>
        </div>
      </div>
      <hr class="w-75">
      <div class="row">
        <div class="col">
          <a href="#">
            <a href="/cart/add/<?php echo $product['id']; ?>" type="button" class="btn btn-block btn-success">Добавить товар в корзину</a>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row pt-1">
    <div class="col">
      <nav>
        <div class="nav nav-tabs" id="nav-tab">
          <a class="nav-item nav-link active" id="description-tab" data-toggle="tab" href="#description">Описание</a>
          <a class="nav-item nav-link" id="comments-tab" data-toggle="tab" href="#comments">Отзывы</a>
          <a class="nav-item nav-link" id="tags-tab" data-toggle="tab" href="#tags">Теги</a>
        </div>
      </nav>
      <div class="tab-content px-1 py-3 border-bottom" id="nav-tabContent">
        <div class="tab-pane fade show active" id="description">
          <?php echo $product["description"]; ?>
        </div>
        <div class="tab-pane fade" id="comments">Хороший товар!</div>
        <div class="tab-pane fade" id="tags">#товар</div>
      </div>
    </div>
  </div>
</div>
</div>
<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
