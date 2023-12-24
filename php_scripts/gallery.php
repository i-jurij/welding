<?php

include ROOTDIR . DIRECTORY_SEPARATOR . 'php_scripts' . DIRECTORY_SEPARATOR . 'ucfirst.php';

    $directory = 'gallery';    // Папка с изображениями

///////////////////////////
//transliterazia
///////////////////////////
function translit_to_lat($textcyr) {
  $cyr = ['Љ', 'Њ', 'Џ', 'џ', 'ш', 'ђ', 'ч', 'ћ', 'ж', 'љ', 'њ', 'Ш', 'Ђ', 'Ч', 'Ћ', 'Ж','Ц','ц', 'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п', 'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я', 'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П', 'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я'
  ];
  $lat = ['Lj', 'Nj', 'Dž', 'dž', 'š', 'đ', 'č', 'ć', 'ž', 'lj', 'nj', 'Š', 'Đ', 'Č', 'Ć', 'Ž','C','c', 'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p', 'r','s','t','u','f','h','ts','ch','sh','sht','a','i','y','e','yu','ya', 'A','B','V','G','D','E','Io','Zh','Z','I','Y','K','L','M','N','O','P', 'R','S','T','U','F','H','Ts','Ch','Sh','Sht','A','I','Y','e','Yu','Ya'
  ];
  $textlat = str_replace($cyr, $lat, $textcyr);
  return $textlat;
}

function translit_to_cyr($textlat) {
  $cyr = ['Љ', 'Њ', 'Џ', 'џ', 'ш', 'ђ', 'ч', 'ћ', 'ж', 'љ', 'њ', 'Ш', 'Ђ', 'Ч', 'Ћ', 'Ж','Ц','ц', 'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п', 'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я', 'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П', 'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я'
  ];
  $lat = ['Lj', 'Nj', 'Dž', 'dž', 'š', 'đ', 'č', 'ć', 'ž', 'lj', 'nj', 'Š', 'Đ', 'Č', 'Ć', 'Ž','C','c', 'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p', 'r','s','t','u','f','h','ts','ch','sh','sht','a','i','y','e','yu','ya', 'A','B','V','G','D','E','Io','Zh','Z','I','Y','K','L','M','N','O','P', 'R','S','T','U','F','H','Ts','Ch','Sh','Sht','A','I','Y','e','Yu','Ya'
  ];
  $textcyr = str_replace($lat, $cyr, $textlat);
  return $textcyr;
}
///////////////////////////////////////

///////////////////////////////////////////////////////////////////
//variant 2
///////////////////////////////////////////////////////////////////
    $pattern2 = '#z*.(jpg|png|jpeg|webm*)#';
    $iterator = new FilesystemIterator($directory);
    $filter = new RegexIterator($iterator, $pattern2);
    foreach ($filter as $name) {
      $nameww = str_replace(' ', '%20', $name);
      $namefn = pathinfo($name,PATHINFO_FILENAME);
/*
      echo '<figure>
              <a href="#' . $namefn . '" >
              <img src="' . $nameww.'" title="'.$namefn.'" alt="'.$namefn.'" />
              </a>
              <figcaption>'
              . mb_ucfirst(translit_to_cyr($namefn)) .
              '</figcaption>
            </figure>
            <a href="index.php#foto" class="lightbox" id="' . $namefn . '">
              <img src="' . $nameww.'" title="'.$namefn.'" alt="'.$namefn.'" />
            </a>'
            ;
*/
      echo '<a href="' . $nameww . '" class="lightzoom">
               <img src="' . $nameww.'" alt="' .$namefn. '" title="' . mb_ucfirst(translit_to_cyr($namefn)) . '"/>
            </a>'
      ;

      }
///////////////////////////////////////////////////////////////////

?>
