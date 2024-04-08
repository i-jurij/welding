<?php
require_once ROOTDIR . DIRECTORY_SEPARATOR . 'php_scripts' . DIRECTORY_SEPARATOR . 'trottle.php';

countPost($remote_ip);

if (!preventTrottle($_SESSION[$remote_ip])) {
  include_once ROOTDIR . DIRECTORY_SEPARATOR . 'parts' . DIRECTORY_SEPARATOR . 'trottle_message.php';
} else {
  if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && preventTrottle($_SESSION[$remote_ip])
    && !empty($_POST['number'])
    && isset($_POST['randcheck'])
    && isset($_SESSION['rand'])
    && $_POST['randcheck'] == $_SESSION['rand']
  ) {
    include_once ROOTDIR . DIRECTORY_SEPARATOR . 'php_scripts' . DIRECTORY_SEPARATOR . 'send_form.php';
    if (!empty($_COOKIE['status'])) {
      include_once ROOTDIR . DIRECTORY_SEPARATOR . 'parts' . DIRECTORY_SEPARATOR . 'post_message.php';
      unset($_COOKIE['status'], $_COOKIE['result']);
    }
    //unset($_SESSION['rand']);
    //session_destroy();
  } else {
    $_SESSION['rand'] = rand();
  }
}

include_once ROOTDIR . DIRECTORY_SEPARATOR . 'parts' . DIRECTORY_SEPARATOR . 'form.php';