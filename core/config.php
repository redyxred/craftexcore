<?php
  session_start();

  // Данные для подключения к MySQL
  $_CONF['db_host'] = "localhost";
  $_CONF['db_user'] = "redyx";
  $_CONF['db_name'] = "craftex";
  $_CONF['db_password'] = "12345qwe";
  $_CONF['db_charset'] = "utf8";

  // Настройки отображения сайта
  $_CONF['url'] = "http://craftex.su";
  $_CONF['title'] = "Craftex.su - ";
  $_CONF['template'] = "Default";
  $_CONF['offline'] = false;

  date_default_timezone_set('Europe/Kiev'); 


  spl_autoload_register( function ($classname) {
    require ROOT.'/core/classes/'.$classname.'.class.php';
  });

?>
