<?php

class Controller
{
  protected $listOfCategories;

  protected $cartItems;
  protected $total;

  protected $isRegistered;
  protected $userInfo;

  public function __construct() {
    $this->listOfCategories = Categories::getCategoriesList();
    $this->cartItems = Cart::getItemsInCart();
    $this->total = Cart::getTotalCostAndCount($this->cartItems);
    $this->isRegistered = User::isLogged();
    if ($this->isRegistered) {
      $this->userInfo = User::getUserInfoById($this->isRegistered);
    };
  }

}
