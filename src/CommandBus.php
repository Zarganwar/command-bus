<?php

namespace Zarganwar\CommandBus;

interface CommandBus
{

	public function registerHandler(string $command, CommandHandler $handler): self;


	public function handle(Command $command);

}