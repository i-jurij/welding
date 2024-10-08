<header class="main-header stickyheader flex">

  <div class="contactsandlogo flex">

    <div class="contacts flex">

      <div class="soztels flex">
        <soz>
          <a href="tg://resolve?domain=<?php echo $telegram; ?>"><img src="imgs/Telegram.svg" alt="Telegram"></img></a>
          <a href="viber://chat?number=%2B<?php $vibe = str_replace(' ', '', $viber);
                                          echo trim($vibe, " +"); ?>"><img src="imgs/Viber.png" alt="Viber"></img></a>
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

      <a href="#recallform" class="recall buttons">Заказ звонка</a>
      <!--      <a href="files/form.php" class="recall buttons">Заказ звонка</a> -->

    </div>

    <a class="logo" href=""><img src="imgs/logo21.png" alt="Логотип" /> <img src="imgs/logo12.png" /></a>

  </div>


  <!-- menu for site. It will be invisible when media screen is small -->
  <nav class="">
    <div class="top-menu">
      <a href="#katalog" class="buttons">Каталог</a>
      <a href="#foto" class="buttons">Фото</a>
      <a href="#about" class="buttons">О нас</a>
      <a href="#map" class="buttons">Как доехать?</a>
    </div>
    <!-- Выпадающее меню, стили его покажут при меньшем media screen -->
    <ul class="nav">
      <li>
        <a href="#" aria-haspopup="true"><img src="imgs/menu.png" srcset="imgs/menu.svg" alt="Меню" height="48px" width="48px" /></a>
        <ul class="dropdown" aria-label="submenu">
          <li>
            <a href="#katalog">Каталог</a>
          </li>
          <li>
            <a href="#foto">Фото</a>
          </li>
          <li>
            <a href="#about">О нас</a>
          </li>
          <li>
            <a href="#map">Как доехать?</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>

</header>