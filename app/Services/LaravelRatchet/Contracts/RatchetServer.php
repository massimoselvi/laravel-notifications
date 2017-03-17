<?php

namespace App\Services\LaravelRatchet\Contracts;

use Ratchet\ConnectionInterface;

interface RatchetServer {
	public function onMessage(ConnectionInterface $conn, $input);
}
