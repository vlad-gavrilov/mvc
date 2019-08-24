<footer class="footer pt-4 px-md-5">
  <div class="container-fluid text-center text-md-left">
    <div class="row">
      <div class="col-md-3 mb-md-0 mb-3">
        <p class="text-uppercase font-weight-bold mb-3">О нас</p>
        <ul class="list-unstyled">
          <li>
            <a href="#!">О нас</a>
          </li>
          <li>
            <a href="#!">Обслуживание клиентов</a>
          </li>
          <li>
            <a href="#!">Политика конфиденциальности</a>
          </li>
        </ul>
      </div>
      <hr class="clearfix w-100 d-md-none pb-3">
      <div class="col-md-3 mb-md-0 mb-3">
        <p class="text-uppercase font-weight-bold mb-3">Обслуживание клиентов</p>
        <ul class="list-unstyled">
          <li>
            <a href="#!">Доставка и возврат</a>
          </li>
          <li>
            <a href="#!">Безопасность</a>
          </li>
          <li>
            <a href="#!">Контакты</a>
          </li>
        </ul>
      </div>
      <hr class="clearfix w-100 d-md-none pb-3">
      <div class="col-md-3 mb-md-0 mb-3">
        <p class="text-uppercase font-weight-bold mb-3">Правила пользования</p>
        <ul class="list-unstyled">
          <li>
            <a href="#!">Пресс-центр</a>
          </li>
          <li>
            <a href="#!">Помощь</a>
          </li>
          <li>
            <a href="#!">Правила</a>
          </li>
        </ul>
      </div>
      <hr class="clearfix w-100 d-md-none pb-3">
      <div class="text-center col-md-3 mt-md-0 mt-3">
        <p class="text-uppercase font-weight-bold">Мы в соцсетях</p>
        <div class="icons">
          <div class="containter-fluid">
            <div class="row">
              <div class="col-3"> <a class="nav-item nav-link" href="#"><i class="fab fa-twitter"></i></a> </div>
              <div class="col-3"> <a class="nav-item nav-link" href="#"><i class="fab fa-vk"></i></a> </div>
              <div class="col-3"> <a class="nav-item nav-link" href="#"><i class="fab fa-instagram"></i></a> </div>
              <div class="col-3"> <a class="nav-item nav-link" href="#"><i class="fab fa-facebook-f"></i></a> </div>
            </div>
            <div class="row cards">
              <div class="col-3"> <a class="nav-item nav-link" href="#"><i class="fab fa-cc-amex"></i></a> </div>
              <div class="col-3"> <a class="nav-item nav-link" href="#"><i class="fab fa-cc-visa"></i></a> </div>
              <div class="col-3"> <a class="nav-item nav-link" href="#"><i class="fab fa-cc-mastercard"></i></a> </div>
              <div class="col-3"> <a class="nav-item nav-link" href="#"><i class="fab fa-btc"></i></a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center pb-1">
    © 2019 YourShop
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
(function ($) {
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
})(jQuery);
</script>

</body>

</html>
