<?php

namespace views;

class ViewHelper {
	const TASK_STATUS_NOT_DONE = 1;
	const TASK_STATUS_DONE = 2;
	const TASKS_IN_PAGE = 3;

	public static function compare($user, $guest) {
		if (empty($user)) {
			return $guest;
		}
		return $user;
	}

	public static function parseStatus($status) {
		if ($status == self::TASK_STATUS_NOT_DONE) {
			return 'Невыполнено';
		}
		return 'Выполнено';
	}

	public static function checkOrder($value) {
		if (strip_tags($_GET['order']) !== NULL && strip_tags($_GET['order']) === $value) {
			return 'selected';
		}
		return NULL;
	}
}