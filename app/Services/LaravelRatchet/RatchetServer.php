<?php

namespace App\Services\LaravelRatchet;

use Ratchet\ConnectionInterface;

class RatchetServer extends \App\Services\LaravelRatchet\RatchetServer {
	public function onMessage(ConnectionInterface $conn, $input) {
		parent::onMessage($conn, $input);

		$this->send($conn, 'Hello you.' . PHP_EOL);

		$this->sendAll('Hello everyone.' . PHP_EOL);

		$this->send($conn, 'Wait, I don\'t know you! Bye bye!' . PHP_EOL);

		$this->abort($conn);
	}
}
