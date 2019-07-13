<?php include_once(ROOT . '/views/layouts/header.php'); ?>
<!--START OF MAIN CONTENT-->
<div class="main-container col1-layout">
  <!--Start of Home Content-->
  <div class="main">
    <div class="col-main">
      <div class="std">

        <!--Start Banner-->
        <div class="banner_box">
          <div class="slider-wrapper banner">
            <!--Place your banner images-->
            <div id="slider" class="banner_slider">
              <a href="#"><img src="/template/images/banner_1.jpg" alt="" /></a>
              <a href="#"><img src="/template/images/banner_2.jpg" alt="" /></a>
              <a href="#"><img src="/template/images/banner_3.jpg" alt="" /></a>
              <a href="#"><img src="/template/images/banner_4.jpg" alt="" /></a>
            </div>
          </div>
          <div class="promotional_block">
            <!--Place your promotional images-->
            <div class="block_one"> <a href="#"><img src="/template/images/promo1.jpg" alt="" /></a> </div>
            <div class="block_one"> <a href="#"><img src="/template/images/promo2.jpg" alt="" /></a> </div>
            <div class="block_two"> <a href="#"><img src="/template/images/promo3.jpg" alt="" /></a> </div>
          </div>
        </div>
        <!--End Banner-->

        <!--Start New Products-->
        <div class="box-center">
          <div class="special">
            <div style="visibility: visible;" id="mix_container" class="mix_container">
              <h1 class="category_page_title">Новые товары</h1>
              <div class="mix_nav"> <span id="mix_prev" class="mix_prev">Previous</span> <span id="mix_next" class="mix_next">Next</span> </div>
              <div id="container" class="mix_wrapper">
                <ul style="position: relative;" class="mix_gallery">
                  <?php $i = 1; foreach($latestList as $key => $product): ?>
                    <li class="item mix_row<?php if (!($i % 5)) echo ' last'; ?>">
                      <div class="outer box"> <a href="/product/<?php echo $product['id']; ?>" class="product-image"><img src="/upload/images/products/<?php echo $product['id']; ?>.jpg" width="165" height="165" alt="<?php echo $product['name']; ?>" /></a>
                        <div class="ic_caption">
                          <h2 class="product-name"><a href="/product/<?php echo $product['id']; ?>" title="<?php echo $product['name']; ?>"><?php echo $product['name']; ?></a></h2>
                          <div>
                            <a rel="example_group" href="/product/<?php echo $product['id']; ?>" class="fancybox quickllook">В корзину</a>
                            <div class="price-box"> <span class="regular-price"> <span class="price">$<?php echo $product['price']; ?></span> </span> </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  <?php ++$i;  endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!--End New Products-->

      </div>
    </div>
  </div>
  <!--End of Home Content-->
  <div style="display: none;" id="back-top"> <a href="#"><img alt="" src="/template/images/backtop.gif" /></a> </div>
</div>
<!--END OF MAIN CONTENT-->
<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
