<?php

namespace controllers;

use models\RequestDatabase;

class FormController {
	public function add_task() {
		if (isset($_POST['add-task'])) {
			isset($_SESSION['user']) ? $this->addUserTask() : $this->addGuestTask();
			header('Location: /');
		}
	}

	public function reg() {
		if (RequestDatabase::checkLogin([$_POST['reg_mail']])) {
			echo '<script>alert("Пользователь с таким логином уже зарегистрирован!");</script>';
			echo '<script> location.href = "/main/register";</script>';

		} else {
			$values = [$_POST['reg_name'], $_POST['reg_password'], $_POST['reg_mail']];
			RequestDatabase::regUser($values);
			header('Location: /');
		}
	}

	public function login() {
		$values = [$_POST['login_mail'], $_POST['login_password']];
		$user = RequestDatabase::findUser($values);
		if (!empty($user)) {
			$_SESSION['user'] = $user;
		} else {
			echo '<script>alert("Неверная почта или пароль!");</script>';
		}
		echo '<script> location.href = "/";</script>';
	}

	public function logout() {
		unset($_SESSION['user']);
		session_destroy();
		header('Location: /');
	}

	private function addUserTask() {
		$values = [$_SESSION['user']['id'], $_POST['task_text']];
		RequestDatabase::addUserTask($values);
	}

	private function addGuestTask() {
		$values = [$_POST['task_name'], $_POST['task_mail'], $_POST['task_text']];
		RequestDatabase::addGuestTask($values);
	}
}