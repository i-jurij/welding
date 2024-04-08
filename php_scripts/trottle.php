<?php
$remote_ip = $_SERVER['REMOTE_ADDR'];

/**
 * function count how many time user reload page by method post 
 * @return array with count and first time of sending form by ip ['ip' => ['count' => count, 'time' => first_time]]
 */
function countPost($remote_ip)
{
    // счетчик $_SESSION[$remote_ip] = ['count' => number, 'time' => time_of_trottle]
    // чтобы проверять время ожидания пользователя перед отправкой следующего запроса
    // время ожидания - 15 минут
    // счетчик отправки с одного ip 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_SESSION[$remote_ip])) {
            $_SESSION[$remote_ip]['count'] = $_SESSION[$remote_ip]['count'] + 1;
        } else {
            $_SESSION[$remote_ip] = ['count' => 0, 'time' => time()];
        }
        return $_SESSION[$remote_ip];
    }
}
/**
 * function for trottle prevent
 * @param array $session_remote_ip - $_SESSION[$remote_ip] from function countPost()
 * @return bool true if user send data of form < 2 time or > 2 but user wait 15 minutes; false if not
 */
function preventTrottle($session_remote_ip)
{
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
}
