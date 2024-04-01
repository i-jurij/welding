<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' 
        && !empty($_POST['number'])
        && isset($_POST['randcheck']) && isset($_SESSION['rand']) && $_POST['randcheck'] == $_SESSION['rand']) {
      include_once ROOTDIR . DIRECTORY_SEPARATOR . 'php_scripts' . DIRECTORY_SEPARATOR . 'send-form.php';
      unset($_SESSION['rand']);
    } else {
      $rand = rand();
      $_SESSION['rand'] = $rand;  
      include ROOTDIR . DIRECTORY_SEPARATOR . 'parts' . DIRECTORY_SEPARATOR . 'form.php';
    }

    if (!empty($_COOKIE['status'])) {
      include_once ROOTDIR . DIRECTORY_SEPARATOR . 'parts' . DIRECTORY_SEPARATOR . 'send-form-message.php';
      unset($_COOKIE['status'], $_COOKIE['result']);
    }