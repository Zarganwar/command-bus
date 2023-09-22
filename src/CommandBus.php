<?php

namespace Zarganwar\CommandBus;

use Zarganwar\CommandBus\BusImplementations\Command\SimpleCommandBus;

interface CommandBus
{
	public function registerHandler(string $command, CommandHandler $handler): SimpleCommandBus;

	public function handle(Command $command): void;
}