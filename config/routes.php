<?php

return array(
  'category/([0-9]+)' => 'category/view/$1',

  'product/([0-9]+)' => 'product/view/$1',

  'cart/add/([0-9]+)' => 'cart/add/$1',
  'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
  'cart/delete/([0-9]+)' => 'cart/delete/$1',
  'cart' => 'cart/index',

  'user/register' => 'user/register',
  'user/login' => 'user/login',
  'user/logout' => 'user/logout',
  'user/edit' => 'user/edit',
  'user' => 'user/index',

  '' => 'site/index',
);
