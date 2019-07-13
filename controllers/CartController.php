<?php

class CartController extends Controller
{
  public function actionIndex () {
    $cartItems = $this->cartItems;
    $total = $this->total;
    include(ROOT . '/views/cart/cart.php');
    return true;
  }

  public function actionAdd($id) {
    Cart::addIntoCart($id);
    $referrer = $_SERVER['HTTP_REFERER'];
    header("Location: $referrer");
  }

  public function actionDelete($id) {
    Cart::deleteItemFromCart($id);
    $referrer = $_SERVER['HTTP_REFERER'];
    header("Location: $referrer");
  }
}
