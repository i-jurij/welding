<?php
    $directory = 'imgs/gallery';    // Папка с изображениями
    $pattern2 = '#z*.(jpg|png|jpeg|webm*)#';
    $iterator = new FilesystemIterator($directory);
    $filter = new RegexIterator($iterator, $pattern2);
    foreach ($filter as $name) {
      $nameww = str_replace(' ', '%20', $name);
      $nameww = pathinfo($nameww,PATHINFO_BASENAME);
      $namefn = pathinfo($name,PATHINFO_FILENAME);
      echo '<a href="/imgs/gallery/' . $nameww . '" class="lightzoom">
               <img src="/imgs/gallery/' . $nameww.'" alt="' .$namefn. '" title="' . $namefn . '"/>
            </a>'
      ;

      }

?>
