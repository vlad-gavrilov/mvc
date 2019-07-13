<?php

return array(
  'category/([0-9]+)' => 'category/view/$1',

  'product/([0-9]+)' => 'product/view/$1',

  'cart/([0-9]+)' => 'cart/add/$1',
  'cart/delete/([0-9]+)' => 'cart/delete/$1',
  'cart' => 'cart/index',

  '' => 'site/index',
);
