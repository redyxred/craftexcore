<?php
  class Tpl {
    private $tpl = null;
    private $config;

    function __construct ($tpl) {
      $this->tpl = ROOT.'/templates/'.$tpl.'/';
    }

    public function getPage($page) {
      $config = include ROOT.'/core/config.php';
      $dir = '/templates/'.$_CONF['template'];
      $_page = $this->tpl.$page.'.php';
      if (file_exists($_page)) {
        include $_page;
      } else {
        throw new Exception("Template {$page} not found.");
      }
    }

  }
?>
