<?php

namespace Zarganwar\CommandBus;

interface CommandHandler
{
	public function handle(Command $command): void;
}