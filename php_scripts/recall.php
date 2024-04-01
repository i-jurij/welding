<?php

require ROOTDIR . DIRECTORY_SEPARATOR . 'php_scripts' . DIRECTORY_SEPARATOR . 'classes_for_work_with_sqlite.php';

$pdo = (new SqliteConnection())->connect();
if ($pdo != null) {
    $mes = 'Connected to the SQLite database successfully!<br />';
} else {
    $mes = 'Whoops, could not connect to the SQLite database!<br />';
}
$sqlite = new SqliteCreateTable($pdo);
// create new tables
$sqlite->createTables();

$query = new SqliteQuery($pdo);
$res = $query->getNoRecall();

?>


<!DOCTYPE html>
<html lang="ru">

 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Сварочные работы в Севастополе</title>
   <link rel="stylesheet" href="css/style.css" media="all" >

 </head>

 <body>
   <main class="send_form_message_main flex">
    <div>
      <div class="content">
        <?php
            if ((bool) $res) {
                foreach ($res as $key => $value) {
                  if (is_array($value)) {
                    foreach ($value as $ke => $val) {
                      echo $ke . ' - ' . $val . '<br />';
                    }
                  } else {
                    print_r($value);
                      echo '<br />';
                  }
                  echo '<br />';
                }
            }
?>
      </div>

    </div>

  </main>

</body>
</html>
