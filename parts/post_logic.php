<?php

function isValidIpAddress($ip)
{
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return false;
    }
    return true;
}

/**
 * function for trottle prevent
 * @param array $session_remote_ip - $_SESSION[$remote_ip] from function countPost()
 * @return bool true if user send data of form < 2 time or > 2 but user wait 15 minutes; false if not
 */
function preventTrottle($session_remote_ip)
{
    if ($session_remote_ip !== false) {
        $count = $session_remote_ip['count'];
        $first_time = $session_remote_ip['time'];
        // waiting_time 900 = 15 min X 60 sec
        $waiting_time = 900;
        $now_time = time();
    
        $diff = $now_time - $first_time;
    
        if ($count < 3 || ($count >= 3 && $diff > $waiting_time)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

$remote_ip = isValidIpAddress($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';

// счетчик $_SESSION[$remote_ip] = ['count' => number, 'time' => time_of_trottle]
// чтобы проверять время ожидания пользователя перед отправкой следующего запроса
// время ожидания - 15 минут
// счетчик отправки с одного ip 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $remote_ip !== '') {
   if (isset($_SESSION[$remote_ip])) {
      //$_SESSION[$remote_ip]['count'] = $_SESSION[$remote_ip]['count'] + 1;
      $_SESSION[$remote_ip]['count'] = $_SESSION[$remote_ip]['count'] + 1;
   } else {
      $_SESSION[$remote_ip] = ['count' => 0, 'time' => time()];
   }
} else {
   $_SESSION[$remote_ip] = false;
}
    

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !preventTrottle($_SESSION[$remote_ip])) {
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