<?php

namespace models;

class Sort {
	private $order;
	private $direction;

	public function sortTasks($tasks, $sort) {
		$this->order = explode('_', $sort)[0];
		$this->direction = explode('_', $sort)[1] === 'asc' ? 1 : -1;

		uasort($tasks, function ($a, $b) {
			$order_a = strtolower(empty($a[$this->order]) ? $a['guest_'.$this->order] : $a[$this->order]);
			$order_b = strtolower(empty($b[$this->order]) ? $b['guest_'.$this->order] : $b[$this->order]);
			if ($order_a === $order_b) {
				return 0;
			}
			return ($order_a  < $order_b ) ? -1 * $this->direction : 1 * $this->direction;
		});

		return $tasks;
	}
}