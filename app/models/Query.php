<?php
namespace models;

use database\Database;

class Query {
	public static function connect($stmt, $values = array()) {
		if (empty(Database::$pdo)) Database::init();
		try {
			$connection = Database::$pdo->prepare($stmt);
			$connection->execute($values);
		} catch (\PDOException $e) {
			debug(json_encode($e->getMessage()));
//			file_put_contents(__DIR__ . '/../../logs/PdoErrors.txt', json_encode($e->getMessage()), FILE_APPEND);
		}
		return $connection;
	}

	public static function getOne($stmt, $values) {
		$connection = self::connect($stmt, $values);
		return $connection->fetch();
	}

	public static function getAllWithLimits($stmt, $values) {
		$connection = self::connect($stmt, $values);
		return $connection->fetchAll();
	}

	public static function getAll($stmt) {
		$connection = self::connect($stmt);
		return $connection->fetchAll();
	}

	public static function send($stmt, $values) {
		$connection = self::connect($stmt, $values);
	}
}