<?php

namespace controllers;

use models\RequestDatabase;

class EditController {

	public function change_status() {
		if (isset($_POST['taskStatus'])) {
			$data = json_decode($_POST['taskStatus']);

			RequestDatabase::changeTaskStatus([$data->status, $data->task]);
		}
	}

	public function save() {
		if (isset($_POST['editor_submit'])) {
			$text = $_POST['editor_text'];
			$id = $_POST['editor_id'];

			RequestDatabase::editTask([$text, $id]);
			header('Location: /');
		}
	}
}