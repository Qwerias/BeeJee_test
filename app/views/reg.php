<div class="reg tasks">
	<div class="reg__content view-port">
		<h1 class="reg__title">Регистрация</h1>
		<form class="reg__form" method="POST" action="/form/reg">
			<p class="reg__form_text">Введите имя:</p>
            <input class="reg__form_input" type="text" name="reg_name" required>
			<p class="reg__form_text">Введите почту:</p>
            <input class="reg__form_input" type="text" name="reg_mail" required>
			<p class="reg__form_text">Введите пароль:</p>
            <input class="reg__form_input" type="password" name="reg_password" required>
            <button class="reg__form_button" type="submit" name="reg">Зарегистрироваться</button>
		</form>
	</div>
</div>
</body>
</html>