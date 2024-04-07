<div class="flex modal_visible" id="send_message">
    <div>
        <div class="form-recall-main">
            <p>Ваш запрос 
                <?php echo $_COOKIE['result']; ?>
            </p>
            <p>
                <?php echo $_COOKIE['status']; ?>
            </p>
            <p id="for_button_insert"></p>
            <noscript>
                <p style="padding: 1rem 0 1rem 0; margin-top:1rem;"><a href='/' class="buttons">Закрыть</a></p>
            </noscript>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        for_button_insert.innerHTML = '<p style="padding: 1rem 0 1rem 0;"><button class="buttons" id="close_message">Закрыть</button></p>';
        close_message.onclick = function () {
            send_message.remove();
        };
    });
</script>