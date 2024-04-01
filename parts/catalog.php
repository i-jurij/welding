<section class="content" id="katalog">
  <h3>Изготовим и установим:</h3>
  <div class="catalog">

    <?php

    $dir = __DIR__ . '/../catalog';

    $pattern1 = '/*.{php,html}';
    $files = array();
    $files_full = array();
    foreach (glob($dir . $pattern1, GLOB_BRACE) as $file) {
      $files[] = basename($file); //file name with ext
      $files_full[] = $file; //full path to file
    }
    foreach ($files_full as $nam) { //create content for catalog
      include $nam; //join files from directory catalog
    }
    echo '<div class="catalog flex">';
    foreach ($files as $name) { //create catalog menu
      $text = file($dir . '/' . $name); //read file as text

      $string = (!empty($text[1])) ? strip_tags($text[1]) : ''; //second string in file without html tags

      $rrr = pathinfo($name, PATHINFO_FILENAME); //file name without ext

      if ($rrr === 'index') {
      } else {
        echo '<a href="#' . $rrr . '" class="buttons">' . $string; //create catalog menu

        // include_once getcwd() . '/files/price-contacts-var.php';
        echo      '<p> от ' . ${$rrr} . ' руб.</p></a>'
          . PHP_EOL;
      }
    }
    echo '</div>';

    ?>

  </div>

</section>