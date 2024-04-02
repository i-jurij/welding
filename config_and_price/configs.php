<?php
    define('PATH_TO_SQLITE_FILE', ROOTDIR . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'sqlite.db');
    //for xampp
    //define('SITENAME', 'localhost/welding');
    // for ospanel
    define('SITENAME', 'welding');
    
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://';
    define('URLROOT', $protocol.SITENAME);

    //contacts for header, footer
    $telegram = 'username';
    $viber = '+7 999 111 22 33';
    $mts = '+7 999 111 22 33';
    $volna = '+7 999 111 22 33';

    //gallery link 
    $gallery = 'some.web.gallery';

    //emailing
    $smtp = 'smtp.yandex.ru';
    $login = 'login';
    $password   = 'kfqthjbnrzdvosho';
    $secure = 'ssl';
    $port = 465;
    $from_where = 'fromhere@yandex.ru'; // Адрес почты, откуда отправляем
    $from_who = 'Welding site'; // имя отправителя
    // Получатель письма
    $to_adress = 'toadress@gmail.com';