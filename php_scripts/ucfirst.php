<?php
      //чтобы ucfirst работал для кириллицы и других многобайтных кодировок
      mb_internal_encoding("UTF-8");
      function mb_ucfirst($text) {
        return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
      }
?>
