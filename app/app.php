<?php
session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';
use controllers\Router;

function debug($var) {
	echo '<pre>';
	print_r($var);
	echo '</pre>';
//	exit;
}

$router = new Router();