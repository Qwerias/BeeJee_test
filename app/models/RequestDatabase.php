<?php

namespace models;

class RequestDatabase {
	public static function findUser($values) {
		$stmt = 'SELECT * FROM users WHERE `mail` = ? AND `password` = ?';
		return Query::getOne($stmt, $values);
	}

	public static function getTasks() {
		$stmt = 'SELECT tasks.id, `text`, `status`, `name`, `mail`, `guest_name`, `guest_mail` FROM tasks LEFT JOIN users on tasks.user = users.id ORDER BY tasks.id DESC';
		return Query::getAll($stmt);
	}

	public static function getAllUsers() {
		$stmt = 'SELECT * FROM users';
		return Query::getAll($stmt);
	}

	public static function addUserTask($values) {
		$stmt = 'INSERT INTO tasks (`user`, `text`, `status`) VALUES (?, ?, 1)';
		Query::send($stmt, $values);
	}

	public static function addGuestTask($values) {
		$stmt = 'INSERT INTO tasks (`guest_name`, `guest_mail`, `text`, `status`) VALUES (?, ?, ?, 1)';
		Query::send($stmt, $values);
	}

	public static function editTask($values) {
		$stmt = 'UPDATE tasks SET `text` = ? WHERE `id` = ?';
		Query::send($stmt, $values);
	}

	public static function regUser($values) {
		$stmt = 'INSERT INTO users (`name`, `password`, `mail`) VALUES (?, ?, ?)';
		Query::send($stmt, $values);
	}

	public static function changeTaskStatus($values) {
		$stmt = 'UPDATE tasks SET `status` = ? WHERE id = ?';
		Query::send($stmt, $values);
	}

	public static function getTaskText($values) {
		$stmt = 'SELECT `text` FROM tasks WHERE `id` = ?';
		return Query::getOne($stmt, $values);
	}

	public static function checkLogin($values) {
		$stmt = 'SELECT * FROM users WHERE `mail` = ?';
		return Query::getOne($stmt, $values);
	}
}