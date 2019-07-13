<?php

class Controller
{
  protected $listOfCategories;

  protected $cartItems;
  protected $total;

  public function __construct() {
    $this->listOfCategories = Categories::getCategoriesList();
    $this->cartItems = Cart::getItemsInCart();
    $this->total = Cart::getTotalCostAndCount($this->cartItems);
  }

}
