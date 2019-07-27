<!--START OF FOOTER-->
<div class="footer-container">
  <div class="footer">

  </div>
  <address>

  </address>
</div>
<!--END OF FOOTER-->
</div>
<!--Minicart JS-->
<script type="text/javascript">
  var minicart_timer;
  jQuery(".trigger-minicart").hover(function() {
    jQuery("#minicart").slideDown();
  });
  jQuery("#minicart").mouseleave(function() {
    jQuery("#minicart").slideUp();
  });
  jQuery("#minicart").hover(function() {
    clearTimeout(minicart_timer);
  });
  jQuery(document).ready(function() {
    jQuery('.pagebox_btn').click(function() {
      if (parseInt(jQuery('.page_pan').css('left')) < 0) {
        jQuery('.page_pan').animate({
          left: '0'
        }, 600, 'easeOutQuint');
      } else {
        jQuery('.page_pan').animate({
          left: '-100px'
        }, 600, 'easeOutQuint');
      }
    });
  });
</script>
</div>

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
<!--END OF WRAPPER-->
</body>

</html>
