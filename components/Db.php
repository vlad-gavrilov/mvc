<?php

abstract class Db
{
  // DataBase Handle: дескриптор базы данных
  private static $DBH;

  // Открыть соединение с БД
  private static function openConnection() {
    // Получаем параметры подключения из файла
    $paramsPath = ROOT . '/config/db_params.php';
    $dbParams = include($paramsPath);
    // Формируем DSN: Data Source Name
    $DSN = "mysql:host={$dbParams['host']};dbname={$dbParams['dbname']};charset={$dbParams['charset']}";
    $user = $dbParams['user'];
    $password = $dbParams['password'];
    // Массив опций подключения
    $options = array(
     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
   );
    try {
      self::$DBH = new PDO($DSN, $user, $password, $options);
    }
    catch(PDOException $e) {
        // Записываем в ошибку в журнал
        file_put_contents(ROOT . '/logs/PDOErrors.txt', date('[Y-m-d H:i:s] ') . $e->getMessage() . PHP_EOL, FILE_APPEND);
    }
  }

  // Получить соединение с БД
  public static function getConnection() {
    // Если соединение еще не открыто, то открываем новое соединение
    if (!self::$DBH) self::openConnection();
    return self::$DBH;
  }

  // Закрыть соединение с БД
  public static function closeConnection(){ //TODO Нужно ли закрывать соединение?
    self::$DBH = null;
  }
}
