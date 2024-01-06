<?php


namespace Zarganwar\CommandBus\Implementation;


use Zarganwar\CommandBus\Command;
use Zarganwar\CommandBus\CommandBus;
use Zarganwar\CommandBus\CommandHandler;
use Zarganwar\CommandBus\Exceptions\RuntimeException;

class SimpleCommandBus implements CommandBus
{

	/**
	 * @var array<string, CommandHandler>
	 */
	private array $handlers = [];


	public function registerHandler(string $command, CommandHandler $handler): self
	{
		$this->handlers[$command] = $handler;

		return $this;
	}


	public function handle(Command $command): mixed
	{
		$class = $command::class;
		$handler = $this->handlers[$class] ?? throw new RuntimeException("No handler registered for command class {$class}");

		return $handler->handle($command);
	}

}