<?php

return array(
  // Категория
  'category/([0-9]+)' => 'category/view/$1',
  // Товар
  'product/([0-9]+)' => 'product/view/$1',
  // Корзина
  'cart/add/([0-9]+)' => 'cart/add/$1',
  'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
  'cart/delete/([0-9]+)' => 'cart/delete/$1',
  'cart/checkout' => 'cart/checkout',
  'cart' => 'cart/index',
  // Пользователь
  'user/register' => 'user/register',
  'user/login' => 'user/login',
  'user/logout' => 'user/logout',
  'user/edit' => 'user/edit',
  'user' => 'user/index',
  // Управление товарами:
  'admin/product/create' => 'adminProduct/create',
  'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
  'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
  'admin/product' => 'adminProduct/index',
  // Управление категориями:
  'admin/category/create' => 'adminCategory/create',
  'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
  'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
  'admin/category' => 'adminCategory/index',
  // Администратор
  'admin' => 'admin/index',
  // Главная
  '' => 'site/index',
);
