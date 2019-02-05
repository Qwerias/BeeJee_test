<div class="add-task tasks">
	<div class="reg__content view-port">
		<h1 class="reg__title">Добавить задачу</h1>
		<form class="reg__form" method="POST" action="/form/add_task">
            <? if (!isset($_SESSION['user'])) :?>
                <p class="reg__form_text">Введите имя:</p>
                <input class="reg__form_input" type="text" name="task_name" required>
                <p class="reg__form_text">Введите почту:</p>
                <input class="reg__form_input" type="text" name="task_mail" required>
            <?endif;?>
			<p class="reg__form_text">Введите текст задачи:</p>
            <textarea class="add-task__form_textarea" name="task_text" required></textarea>
            <button class="reg__form_button" type="submit" name="add-task">Добавить</button>
		</form>
	</div>
</div>
</body>
</html>
