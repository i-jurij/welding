<div class="flex modal_visible" id="trottle_message">
    <div>
      <div class="form-recall-main">
        <p>Вы отправили данные из формы три раза. <br>
          Если запрос был отправлен - мы обязательно вам перезвоним. <br>
          Если возникли ошибки на сервере - позвоните нам или попробуйте отправить запрос позже.
        </p>
        <p id="for_button_close_insert"></p>
        <noscript>
          <p style="padding: 1rem 0 1rem 0; margin-top:1rem;"><a href='/' class="buttons">Закрыть</a></p>
        </noscript>
      </div>

    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      for_button_close_insert.innerHTML = '<p style="padding: 1rem 0 1rem 0;"><button class="buttons" id="close_trottle_message">Закрыть</button></p>';
      close_trottle_message.onclick = function() {
        trottle_message.remove();
      };
    });
  </script>