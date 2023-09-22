<?php

namespace Zarganwar\CommandBus\Command;

interface CommandBus
{
	public function registerHandler(string $command, CommandHandler $handler): SimpleCommandBus;

	public function handle(Command $command): void;
}