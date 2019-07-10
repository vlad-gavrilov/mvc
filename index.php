<?php
/*
  Front Controller
  Изначально все запросы перенаправляются на этот файл
*/

//Вывод ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Старт куки-сессии
session_start();

//Определение константы ROOT именем корневого каталога
define('ROOT', __DIR__);

require_once(ROOT . '/components/Router.php'); //TODO Заменить на __autoload

//Создаем объект класса Router
$router =  new Router();
//Вызываем метод run()
$router->run();
