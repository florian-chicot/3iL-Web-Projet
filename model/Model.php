<?php

abstract class Model {
  private static $pdo = NULL;

  public static function init() {
    $dsn = 'mysql:host=mysql-florian-chicot-3il.alwaysdata.net;dbname=florian-chicot-3il_mes-matchs;charset=utf8';
    $user = '380954_admin';
    $password = 'e92X4nqD';

    try {
      self::$pdo = new PDO($dsn, $user, $password);
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
  }

  public static function getPDO() {
    if(is_null(self::$pdo)) {
      self::init();
    }
    return self::$pdo;
  }


}