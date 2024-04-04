<div class="content footer">

  <div class=" footercontacts">
    <soz>
      <a href="tg://resolve?domain=<?php echo $telegram; ?>"><img src="/imgs/Telegram.svg" alt="Telegram"></img></a>
      <a href="viber://chat?number=%2B<?php $vibe = str_replace(' ', '', $viber); echo trim($vibe, " +"); ?>"><img
          src="/imgs/Viber.png" alt="Viber"></img></a>
    </soz>

    <tels>
      <a href="tel:<?php echo preg_replace('/\s+/', '', $mts); ?>">
        <?php echo $mts; ?> (МТС)
      </a>
      <a href="tel:<?php echo preg_replace('/\s+/', '', $volna); ?>">
        <?php echo $volna; ?> (Волна)
      </a>
    </tels>
  </div>

  <p>
    <a href="index.php#pers" class="">Политика обработки персональных данных</a>
  </p>

  <p>
    <?php echo "2022 - " . date('Y') . PHP_EOL; ?>
  </p>

</div>