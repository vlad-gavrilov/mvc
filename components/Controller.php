<?php

class Controller
{
  protected $listOfCategories;

  protected $isRegistered;
  protected $userInfo;

  protected $cartItems;
  protected $total;

  public function __construct() {
    $this->listOfCategories = Categories::getCategoriesList();

    $this->isRegistered = User::isLogged();

    if ($this->isRegistered) {
      $this->userInfo = User::getUserInfoById($this->isRegistered);

      $this->cartItems = CartAuthorized::getItemsInCart();
      $this->total = CartAuthorized::getTotalCostAndCount($this->cartItems);
    } else {
      $this->cartItems = CartUnauthorized::getItemsInCart();
      $this->total = CartUnauthorized::getTotalCostAndCount($this->cartItems);
    }
  }

}
