<?php
  class DB {
    static private $db;


    public static function init() {
      include ROOT.'/core/config.php';

      $dsn = "mysql:host=".$_CONF['db_host'].";dbname=".$_CONF['db_name'].";charset=".$_CONF['db_charset'];
      self::$db = new PDO($dsn, $_CONF['db_user'], $_CONF['db_password']);
    }

    public static function query($sql) {
      return self::$db->query($sql);
    }

    public static function exec($sql) {
      return self::$db->exec($sql);
    }

    public static function column($sql) {
      return self::$db->query($sql)->fetchColumn();
    }

    public static function columnInt($sql) {
      return intval(self::$db->query($sql)->fetchColumn());
    }

    public static function prepare($sql) {
      return self::$db->prepare($sql);
    }

    public static function lastInsertId() {
      return self::$db->lastInsertId();
    }

    public static function execute($sql, $ar) {
      return self::$db->prepare($sql)->execute($ar);
    }

    public static function fetchAssoc($sql) {
      return self::$db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public static function fetchAll ($sql) {
      return self::$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function fetchNum($sql) {
      return self::$db->query($sql)->fetch(PDO::FETCH_NUM);
    }
  }
?>
