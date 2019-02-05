<?php

namespace controllers;

class UserController {
	private $mail;

	public function __construct() {
		$this->mail = $_SESSION['user']['mail'];
	}

	public function isAdmin() {
		return $this->mail === 'admin';
	}
}