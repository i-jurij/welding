<script type="text/javascript" src="/js/lightzoom/lightzoom.js"></script>

<section class="content" id="foto">
    <h3>Фото выполненных работ</h3>

    <div class="gallery flex pswp-gallery" id="my-gallery">
      <?php
        include ROOTDIR . DIRECTORY_SEPARATOR . 'php_scripts' . DIRECTORY_SEPARATOR . 'gallery.php';
      ?>
    </div>
    <p>Фотографии всех выполненных работ можно посмотреть <a href="<?php echo $gallery;?>">здесь</a></p>
</section>

<script type="text/javascript">
  jQuery('.lightzoom').lightzoom();
</script>
