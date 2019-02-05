<?php
namespace database;

require_once __DIR__ . '/../../config/db.php';

class Database {
	public static $pdo;

	public static function init() {
		$dsn = "mysql:host=" . HOST . ";dbname=" . BASE . ";charset=utf8";
		$opt = [
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
			\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
			\PDO::ATTR_EMULATE_PREPARES => false
		];

		self::$pdo = new \PDO($dsn, USER, PASSWORD, $opt);
	}
}