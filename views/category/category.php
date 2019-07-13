<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="main-container col2-left-layout">
  <div class="main">
    <div class="col-main">
      <!--Category Title-->
      <div class="page-title category-title">
        <h1>Womens</h1>
      </div>
      <!--Category Image-->
      <p class="category-image"><h2>Категория: <b><?php echo mb_strtoupper($categoryItem['name']); ?></b></h2></p>
      <div class="category-products">
        <!--Start toolbar-->
        <div class="toolbar">
          <div class="pager">
            <div class="limiter">
              <label>Show</label>
              <select>
                <option selected="selected"> 9 </option>
                <option> 15 </option>
                <option> 30 </option>
              </select>
            </div>
          </div>
          <div class="sorter">
            <p class="view-mode">
              <label>View as:</label>
              <strong title="Grid" class="grid">Grid</strong>&nbsp; <a href="#" title="List" class="list">List</a>&nbsp; </p>
          </div>
          <div class="pagination">
            <div class="pages"> <strong>Page:</strong>
              <ol>
                <li class="current">1</li>
                <li><a href="#">2</a></li>
                <li> <a class="next i-next" href="#" title="Next"></a> </li>
              </ol>
            </div>
          </div>
        </div>
        <!--End toolbar-->

        <!--Start Category Product List-->
        <ul class="products-grid first odd">
          <?php $i = 1; ?>
          <?php foreach($productList as $key => $product): ?>
            <li class="item <?php if ($i % 3) echo 'first'; else echo 'last'; ?>">
              <a href="/product/<?php echo $product["id"]; ?>" title="<?php echo $product["name"]; ?>" class="product-image">
                <img src="/upload/images/products/<?php echo $product["id"]; ?>.jpg" width="135" height="165" alt="<?php echo $product["name"]; ?>" />
              </a>
              <h2 class="product-name">
                <a href="/product/<?php echo $product["id"]; ?>" title="<?php echo $product["name"]; ?>"><?php echo $product["name"] ?></a>
              </h2>
              <div class="price-box">
                <span class="regular-price">
                  <span class="price">$<?php echo $product["price"]; ?></span>
                </span>
              </div>
              <div class="actions">
                <a href="/cart/<?php echo $product["id"]; ?>">
                  <button type="button" title="Add to Cart" class="button btn-cart">
                    <span><span>В корзину</span></span>
                  </button>
                </a>
                <a href="/product/<?php echo $product["id"]; ?>" class="fancybox quick_view">Смотреть</a>
                <ul class="add-to-links">
                  <li><a href="#" class="link-wishlist">&nbsp&nbspВ закладки&nbsp&nbsp&nbsp&nbsp&nbsp</a></li> <!-- TODO Выровнять нормально -->
                  <li class="last"><a href="#" class="link-compare">Сравнение&nbsp&nbsp</a></li>
                </ul>
              </div>
            </li>
            <?php ++$i; ?>
          <?php endforeach;?>
        </ul>
        <!--End Category Product List-->

        <!--Start toolbar bottom-->
        <div class="toolbar-bottom">
          <div class="toolbar">
            <div class="pager">
              <div class="limiter">
                <label>Show</label>
                <select>
                  <option selected="selected"> 9 </option>
                  <option> 15 </option>
                  <option> 30 </option>
                </select>
              </div>
            </div>
            <div class="sorter">
              <p class="view-mode">
                <label>View as:</label>
                <strong title="Grid" class="grid">Grid</strong>&nbsp; <a href="#" title="List" class="list">List</a>&nbsp; </p>
            </div>
            <div class="pagination">
              <div class="pages"> <strong>Page:</strong>
                <ol>
                  <li class="current">1</li>
                  <li><a href="#">2</a></li>
                  <li> <a class="next i-next" href="#" title="Next"></a> </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--End toolbar bottom-->
      </div>
    </div>
    <div class="col-left sidebar">
      <!--Start Magic Category Block-->
      <div class="magicat-container">
        <div class="block">
          <div class="block-title cat_heading"> <strong><span>Womens</span></strong> </div>
          <ul id="magicat">
            <li class="first level0-inactive level0 inactive"><span class="magicat-cat"><a href="#"><span>Sweaters</span></a></span> </li>
            <li class="level0-inactive level0 inactive"><span class="magicat-cat"><a href="#"><span>Knit Tops</span></a></span> </li>
            <li class="level0-inactive level0 inactive"><span class="magicat-cat"><a href="#"><span>Shirts &amp; Blouses</span></a></span> </li>
            <li class="level0-inactive level0 inactive"><span class="magicat-cat"><a href="#"><span>Tee Shirts</span></a></span> </li>
            <li class="last level0-inactive level0 inactive"><span class="magicat-cat"><a href="#"><span>Outerwear &amp; Jackets</span></a></span></li>
          </ul>
        </div>
      </div>
      <!--End Magic Category Block-->

      <!--Start Layered nav-->
      <div class="block block-layered-nav">
        <div class="block-title"> <strong><span>Shop By</span></strong> </div>
        <div class="block-content">
          <div id="narrow-by-list">
            <div>
              <div class="last collapse" id="filter_heading">Price</div>
              <div class="last odd" id="filter_content">
                <ul>
                  <li> <a href="#"><span class="price">$0.00</span> - <span class="price">$1,000.00</span></a> (2) </li>
                  <li> <a href="#"><span class="price">$2,000.00</span> - <span class="price">$3,000.00</span></a> (9) </li>
                </ul>
              </div>
              <script type="text/javascript">
                jQuery('#filter_heading').click(function() {
                  jQuery('#filter_content').slideToggle('slow');
                  jQuery(this).toggleClass("highlight");
                });
              </script>
            </div>
          </div>
        </div>
      </div>
      <!--End Layered nav-->

      <!--Start Compare Products-->
      <div class="block block-list block-compare">
        <div class="block-title"><strong><span>Compare Products</span></strong> </div>
        <div class="block-content">
          <p class="empty">You have no items to compare.</p>
        </div>
      </div>
      <!--End Compare Products-->

      <!--Start Poll-->
      <div class="block block-poll">
        <div class="block-title"> <strong><span>Community Poll</span></strong> </div>
        <form action="">
          <div class="block-content">
            <p class="block-subtitle">What is your favorite Magento feature?</p>
            <ul id="poll-answers">
              <li class="odd">
                <input name="vote" class="radio poll_vote" id="vote_5" value="5" type="radio" />
                <span class="label">
                  <label for="vote_5">Layered Navigation</label>
                </span> </li>
              <li class="even">
                <input name="vote" class="radio poll_vote" id="vote_6" value="6" type="radio" />
                <span class="label">
                  <label for="vote_6">Price Rules</label>
                </span> </li>
              <li class="odd">
                <input name="vote" class="radio poll_vote" id="vote_7" value="7" type="radio" />
                <span class="label">
                  <label for="vote_7">Category Management</label>
                </span> </li>
              <li class="last even">
                <input name="vote" class="radio poll_vote" id="vote_8" value="8" type="radio" />
                <span class="label">
                  <label for="vote_8">Compare Products</label>
                </span> </li>
            </ul>
            <div class="actions">
              <button type="submit" title="Vote" class="button"><span><span>Vote</span></span></button>
            </div>
          </div>
        </form>
      </div>
      <!--End Poll-->
    </div>
  </div>
  <div style="display: none;" id="back-top"> <a href="#"><img alt="" src="images/backtop.gif" /></a> </div>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
