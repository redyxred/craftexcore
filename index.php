<?php
  define('ROOT', __DIR__);

  require ROOT.'/core/config.php';

  try {
    $tpl = new Tpl($_CONF['template']);
    $page = $_GET['page'];

    switch ($page) {
      case 'register':
        if (User::checkSession()) {
          header("Location: /account");
        } else {
          $tpl->getPage($page);
        }
        break;
      case 'login':
        if (User::checkSession()) {
          header("Location: /account");
        } else {
          $tpl->getPage($page);
        }
        break;
      case 'account':
        if (User::checkSession()) {
          $tpl->getPage($page);
        } else {
          header("Location: /account/login");
        }
        break;
      case 'userinfo':
        $tpl->getPage($page);
        break;
      default:
        $tpl->getPage("index");
        break;
    }
  } catch (Exception $e) {
    die($e->getMessage());
  }
