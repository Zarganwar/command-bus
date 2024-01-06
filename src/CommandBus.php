<?php

namespace Zarganwar\CommandBus;

use Zarganwar\CommandBus\Implementation\SimpleCommandBus;

interface CommandBus
{

	public function registerHandler(string $command, CommandHandler $handler): SimpleCommandBus;


	public function handle(Command $command): mixed;

}