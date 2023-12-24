<?php
  session_start();
  define('ROOTDIR', __DIR__);

  include_once ROOTDIR . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'configs.php';
  include_once ROOTDIR . DIRECTORY_SEPARATOR . 'price' . DIRECTORY_SEPARATOR . 'price.php';
  include_once ROOTDIR . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'main_page.html';
?>