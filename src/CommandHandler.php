<?php

namespace Zarganwar\CommandBus\Command;

interface CommandHandler
{
	public function handle(Command $command): void;
}