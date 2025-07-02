<div id="orderModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="orderMessage">Ваш заказ успешно оформлен! Спасибо за покупку.</p>
        <button class="silk">
            <a href="../index.php">Вернуться к каталогу</a>
        </button>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('orderModal');
    const closeBtn = document.querySelector('.close');

    // Показать модальное окно, если в нем есть сообщение
    const orderMessage =
        '<?= isset($_SESSION['message']) ? htmlspecialchars($_SESSION['message']) : '' ?>';
    if (orderMessage) {
        document.getElementById('orderMessage').textContent = orderMessage;
        modal.style.display = 'block';
        <?php unset($_SESSION['message']); ?>
    }

    // Закрытие окна при клике на кнопку "Закрыть"
    closeBtn.onclick = function() {
        modal.style.display = 'none';
    };

    // Закрытие окна при клике вне его
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };
});
</script>