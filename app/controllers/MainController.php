<?php
namespace controllers;

use models\RequestDatabase;
use models\Sort;

class MainController {
	private $viewsPath;

	public function __construct() {
		$this->viewsPath = __DIR__ . '/../views/';
		$this->renderHeader();
	}

	public function index() {
		$this->renderTasks();
	}

	public function task() {
		$this->renderTaskForm();
	}

	public function register() {
		$this->renderReg();
	}

	public function edit() {
		$this->renderEditor();
	}

	private function renderHeader() {
		include $this->viewsPath . 'header.php';
	}

	private function renderTasks() {
		$tasks = RequestDatabase::getTasks();

		if (isset($_GET['order'])) {
			$sort = new Sort();
			$tasks = $sort->sortTasks($tasks, strip_tags($_GET['order']));
		}

		if (isset($_SESSION['user'])) {
			$user = new UserController();
		}

		include $this->viewsPath . 'main.php';
	}

	private function renderTaskForm() {
		include  $this->viewsPath . 'task.php';
	}

	private function renderReg() {
		include  $this->viewsPath . 'reg.php';
	}

	private function renderEditor() {
		$id = strip_tags($_GET['id']);
		$text = trim(RequestDatabase::getTaskText([$id])['text']);

		include $this->viewsPath . 'editor.php';
	}
}