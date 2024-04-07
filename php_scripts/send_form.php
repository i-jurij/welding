<?php

// ///////////////////////////////////////////////
$name = (!empty($_POST['name'])) ? trim(urldecode(htmlspecialchars($_POST['name']))) : '';
$number = (!empty($_POST['number'])) ? trim(urldecode(htmlspecialchars($_POST['number']))) : '';
$send = (!empty($_POST['send'])) ? trim(urldecode(htmlspecialchars($_POST['send']))) : '';
$mes = '';
$tel_mts = preg_replace('/\s+/', '',$mts);
$tel_volna = preg_replace('/\s+/', '',$volna);

/*
//// START work with db ////
require ROOTDIR . DIRECTORY_SEPARATOR . 'php_scripts' . DIRECTORY_SEPARATOR . 'classes_for_work_with_sqlite.php';

$pdo = (new SqliteConnection())->connect();

$sqlite = new SqliteCreateTable($pdo);
// create new tables
$sqlite->createTables();

$insert = new SqliteInsert($pdo);
$insert->insertCall($number, $name, $send);
//// END work with db ////
*/

/*
//// START отправка с помощью почтового сервера на хостинге ////
  // несколько получателей
$to = $to_adress . ', ';  // обратите внимание на запятую
$to .= '';

// тема письма
$subject = 'Письмо с моего сайта';

// текст письма
$message = 'Пользователь '.$name.' отправил вам письмо:<br />'.$send.'<br />
  Связяться с ним можно по телефону <a href="tel:'.$number.'">'.$number.'</a>'
;

// Для отправки HTML-письма должен быть установлен заголовок Content-type
$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";

  // Дополнительные заголовки
//$headers .= 'To: Jurij <yjurij@gmail.com>'."\r\n"; // Свое имя и email
$headers .= 'X-Mailer: PHP/'.phpversion();

// Отправляем, если на хосте настроен почтовый сервер и у него есть доступ к серверу вашей почты
if (mail($to, $subject, $message, $headers)) {
    $mes .= 'Сообщение успешно отправлено';
// dlia proverki soderzhimoho
// echo $message;
} else {
    $mes .= 'При отправке сообщения возникли ошибки';
}
//// END отправка с помощью почтового сервера на хостинге ////
*/


///////////////////////////////////////////////////////////////////////////
//// START отправка из реального почтового ящика с помощью PHPMailer ////
///////////////////////////////////////////////////////////////////////////

// Файлы phpmailer
require ROOTDIR . DIRECTORY_SEPARATOR . 'phpmailer' . DIRECTORY_SEPARATOR . 'PHPMailer.php';
require ROOTDIR . DIRECTORY_SEPARATOR . 'phpmailer' . DIRECTORY_SEPARATOR . 'SMTP.php';
require ROOTDIR . DIRECTORY_SEPARATOR . 'phpmailer' . DIRECTORY_SEPARATOR . 'Exception.php';
/*
// Переменные, которые отправляет пользователь
$name = trim(urldecode(htmlspecialchars($_POST['name'])));
$number = trim(urldecode(htmlspecialchars($_POST['number'])));
$send = trim(urldecode(htmlspecialchars($_POST['send'])));
*/
// Формирование самого письма
$title = "Перезвонить!";
$body = "
<h2>Перезвоните клиенту</h2>
<b>Имя:</b> $name<br>
<b>Телефон:</b>
<a href=tel: $number > $number <br><br>
<b>Сообщение:</b><br>$send
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
  $mail->isSMTP();
  $mail->CharSet = "UTF-8";
  $mail->SMTPAuth   = true;
  $mail->SMTPDebug = 2;
  $mail->Debugoutput = function ($str, $level) {
    $GLOBALS['status'][] = $str;
  };

  // Настройки вашей почты
  $mail->Host       = $smtp; // SMTP сервера вашей почты
  $mail->Username   = $login; // Логин на почте
  $mail->Password   = $password; // Пароль на почте
  $mail->SMTPSecure = $secure;
  $mail->Port       = $port;
  $mail->setFrom($from_where, $from_who); // Адрес самой почты и имя отправителя

  // Получатель письма
  $mail->addAddress($to_adress);
  //$mail->addAddress('youremail@gmail.com'); // Ещё один, если нужен

  // Отправка сообщения
  $mail->isHTML(true);
  $mail->Subject = $title;
  $mail->Body = $body;

  // Проверяем отравленность сообщения
  if ($mail->send()) {
    $result = 'отправлен';
    $status = " <b>Имя:</b> " . $name . "<br>
                  <b>Телефон: </b>" . $number . "<br>
                  <b>Сообщение: </b><br>$send";
  } else {
    $result = "НЕ ОТПРАВЛЕН.";
    $status = <<<EOT
                Ошибки сервера.<br><br>
                Позвоните нам, пожалуйста:<br>
                <tels>
                <a href="tel: $tel_mts "> $mts
                </a>
                <a href="tel: $tel_volna "> $volna
                </a>
              </tels>
EOT;
  }
} catch (Exception $e) {
  $result = 'не отправлен.';
  $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
// echo json_encode(["result" => $result, "status" => $status]);
$_COOKIE['result'] = $result;
$_COOKIE['status'] = $status;
