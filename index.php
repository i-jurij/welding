<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Сварочные работы в Севастополе</title>
  <link rel="stylesheet" href="/style/css/style.css" media="all">
  <link rel="stylesheet" href="/js/lightzoom/style.css" type="text/css">
  <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div class="wrapper">
    <?php
    session_start();
    define('ROOTDIR', __DIR__);
    require_once ROOTDIR . DIRECTORY_SEPARATOR . 'config_and_price' . DIRECTORY_SEPARATOR . 'configs.php';

    if (
      $_SERVER['REQUEST_URI'] === '/recall'
    ) { ?>
      <?php
      include_once ROOTDIR . DIRECTORY_SEPARATOR . 'recall.php';
      ?>
    <?php } else {
      include_once ROOTDIR . DIRECTORY_SEPARATOR . 'config_and_price' . DIRECTORY_SEPARATOR . 'price.php';
      include_once ROOTDIR . DIRECTORY_SEPARATOR . 'parts' . DIRECTORY_SEPARATOR . 'post_logic.php';
      include_once ROOTDIR . DIRECTORY_SEPARATOR . 'parts' . DIRECTORY_SEPARATOR . 'header.php';
    ?>

      <main class="main">
        <h1 class="visually-hidden">Производство и монтаж заборов, ворот, калиток, навесов, беседок, лестниц и других
          изделий и конструкций из металла</h1>

        <?php
        include_once ROOTDIR . DIRECTORY_SEPARATOR . 'parts' . DIRECTORY_SEPARATOR . 'catalog.php';
        include_once ROOTDIR . DIRECTORY_SEPARATOR . 'parts' . DIRECTORY_SEPARATOR . 'gallery.php';
        include_once ROOTDIR . DIRECTORY_SEPARATOR . 'parts' . DIRECTORY_SEPARATOR . 'about.html';
        include_once ROOTDIR . DIRECTORY_SEPARATOR . 'parts' . DIRECTORY_SEPARATOR . 'map.html';
        include_once ROOTDIR . DIRECTORY_SEPARATOR . 'parts' . DIRECTORY_SEPARATOR . 'persinfo.html';
        include_once ROOTDIR . DIRECTORY_SEPARATOR . 'parts' . DIRECTORY_SEPARATOR . 'upbutton.html';
        ?>

      </main>

    <?php
      include_once ROOTDIR . DIRECTORY_SEPARATOR . 'parts' . DIRECTORY_SEPARATOR . 'footer.php';
    }
    ?>
  </div>
  <script src="/js/jquery.maskedinput.min.js"></script>
  <script src="/js/form-recall-mask.js"></script>

</body>

</html>