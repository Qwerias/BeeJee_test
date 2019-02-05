<?php

namespace controllers;

class Router {
	private $controller;
	private $action;
	private $url;

	public function __construct() {
		$this->init();
	}

	private function init() {
		$this->parseUrl();

		$controller = explode('/', $this->url)[0];
		$this->action = explode('/', $this->url)[1];
		$this->controller = 'controllers\\' . ucfirst($controller) . 'Controller';

		if (class_exists($this->controller)) {
			$this->act();
		} else {
			echo 'Неверный маршрут: ' . $this->url;
		}
	}

	private function parseUrl() {
		$this->url = trim(urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), '/');
		if ($this->url == '') $this->url = 'main/index';
	}

	private function act() {
		$controller = new $this->controller();
		$controller->{$this->action}();
	}
}