<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="format-detection" content="address=no" />
		<link rel="stylesheet" href="/css/reset.css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" />
		<link rel="stylesheet" href="/css/style.css" /><script src="/libs/jquery.min.js" defer="defer"></script>
        <script src="/js/script.js" defer="defer"></script>
		<title>BeeJee</title>
	</head>
	<body>
		<header class="header view-port"><a class="header__logo" href="/">Логотип</a>

            <? if (!isset($_SESSION['user'])) :?>
                <form class="header__login" action="/form/login" method="POST">
                    <input class="header__login_input" type="text" name="login_mail" placeholder="Введите почту" required/>
                    <input class="header__login_input" type="password" name="login_password" placeholder="Введите пароль" required/>
                    <button class="header__login_button" type="submit" name="login">Войти</button>
                </form>
            <? else : ?>
                <div class="header__account">
                    <div class="header__account_text">
	                    <?= $_SESSION['user']['name']; ?>
                    </div>
                    <a class="header__login_button" href="/form/logout">Выйти</a>
                </div>
            <? endif; ?>

		</header>
		<nav class="nav view-port"><a class="nav__item" href="/main/register">Регистрация</a><a class="nav__item" href="/main/task">Добавить задачу</a></nav>