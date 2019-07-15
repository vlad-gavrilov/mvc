<!--START OF FOOTER-->
<div class="footer-container">
  <div class="footer">
    <div class="f-fix">
      <div class="frame">.</div>
      <!--Shipping Block-->
      <div class="free-shipping">Enjoy free shipping <span>on all orders as our holiday gift for you!</span></div>
      <!--Shipping Block-->

      <!--Newsletter-->
      <form method="post" id="newsletter-validate-detail" action="">
        <div class="form-subscribe">
          <div class="form-subscribe-header">Sign up for newsletter</div>
          <div class="input-box">
            <input onfocus="if(this.value=='Enter email address') {this.value=''};" onblur="if(this.value=='') {this.value='Enter email address'};" value="Enter email address" name="email" id="newsletter" title="Sign up for newsletter"
              class="input-text required-entry validate-email" type="text" />
            <button type="submit" title="Submit" class="button"><span>Submit</span></button>
          </div>
        </div>
      </form>
      <!--Newsletter-->

    </div>
    <div class="f-left bottom_links">
      <div class="footer-content">
        <div class="block_1">
          <h3>About us</h3>
          <!--Footer links-->
          <ul class="footer_links">
            <li> <a href="#">About Us</a></li>
            <li> <a href="#">Customer Service</a></li>
            <li> <a href="#">Privacy Policy</a></li>
          </ul>
        </div>
        <div class="block_1">
          <h3>Customer Services</h3>
          <!--Footer links-->
          <ul class="footer_links">
            <li> <a href="#">Shipping &amp; Returns</a></li>
            <li> <a href="#">Secure Shopping</a></li>
            <li> <a href="#">Contact us</a></li>
          </ul>
        </div>
        <div class="block_1">
          <!--Footer links-->
          <h3>Terms &amp; Conditions</h3>
          <ul class="footer_links">
            <li> <a href="#">Press Room</a></li>
            <li> <a href="#">Help</a></li>
            <li> <a href="#">Terms &amp; Conditions</a></li>
          </ul>
        </div>
        <div class="block_2">
          <h3>Connect &amp; Share</h3>
          <!--Social links-->
          <div class="social_box">
            <div class="facebook"><a title="Facebook" href="#"></a></div>
            <div class="twitter"><a title="Twitter" href="#"></a></div>
            <div class="linkedin"><a title="Linkedin" href="#"></a></div>
            <div class="youtube"><a title="Youtube" href="#"></a></div>
          </div>
          <!--Payment Icons-->
          <div class="payment"> <img src="/template/images/amexp.jpg" alt="" /> <img src="/template/images/visa.jpg" alt="" /> <img src="/template/images/mastercard.jpg" alt="" /> <img src="/template/images/discover.jpg" alt="" /> </div>
        </div>
      </div>
    </div>
  </div>
  <address>
    © 2012 Santana Demo Store. All Rights Reserved. Design &amp; Develop by <a href="http://www.magicdesignlabs.com/">MagicDesignLabs</a>
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
<!--pages box-->
<div class="page_pan" style="left:-100px;">
  <div class="page_box">
    <a href="http://www.magicdesignlabs.in/santana_html/index.html">Home</a>
    <a href="http://www.magicdesignlabs.in/santana_html/category.html">Category</a>
    <a href="http://www.magicdesignlabs.in/santana_html/product.html">Product</a>
    <a href="http://www.magicdesignlabs.in/santana_html/checkout.html">Checkout</a>
    <a href="http://www.magicdesignlabs.in/santana_html/contacts.html">Contact us</a>
  </div>
  <div class="pagebox_btn">
    <span>P</span>
    <span>A</span>
    <span>G</span>
    <span>E</span>
    <span>S</span>
  </div>
</div>
<!--end pages box-->
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
