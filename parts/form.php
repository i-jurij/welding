<div class="formrec flex" id="recallform">

  <!-- форма заказа звонка, невидима, видима при нажатии кнопки buttonform -->
  <form action="#" method="post" class="form-recall" name="recall" id="recall">
    <fieldset class="form-recall-main">
      <h2>Перезвоните мне!</h2>
      <div class="form-recall-main-section">
        <div class=" flex">
          <input type="hidden" value=<?php echo $_SESSION['rand']; ?> name="randcheck" />
          <input type="text" placeholder="Ваше имя" name="name" id="name" maxlength="50"></input>
          <input type="tel" name="number" id="number" class="number" title="Формат: +7 999 999 99 99"
            placeholder="+7 ___ ___ __ __"
            pattern="(\+?7|8)?\s?[\(]{0,1}?\d{3}[\)]{0,1}\s?[-]{0,1}?\d{1}\s?[-]{0,1}?\d{1}\s?[-]{0,1}?\d{1}\s?[-]{0,1}?\d{1}\s?[-]{0,1}?\d{1}\s?[-]{0,1}?\d{1}\s?[-]{0,1}?\d{1}\s?[-]{0,1}?"
            required></input>
          <div id="error"><small></small></div>
          <textarea placeholder="Ваше сообщение" name="send" id="send" maxlength="300"></textarea>
        </div>
      </div>
      <div class="form-recall-main-section">
        <button class="buttons form-recall-submit" type="submit">Отправить</button>
        <button class="buttons form-recall-reset" type="reset">Очистить</button>
        <a href="#">
          <button type="button" aria-label="Close" class="form-recall-close">
            <span aria-hidden="true">×</span>
          </button>
        </a>

      </div>
    </fieldset>

    <div class="form-recall-main">
      <p>
        Отправляя данную форму, вы даете согласие на
      </p>
      <a href="index.php#pers">
        обработку персональных данных
      </a>
    </div>

  </form>
  <!-- end form-->
</div>