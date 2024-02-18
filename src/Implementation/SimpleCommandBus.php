<?php


namespace Zarganwar\CommandBus\Implementation;


use Zarganwar\CommandBus\Command;
use Zarganwar\CommandBus\CommandBus;
use Zarganwar\CommandBus\CommandHandler;
use Zarganwar\CommandBus\Exceptions\CommandHandlerNotFoundException;

class SimpleCommandBus implements CommandBus
{

	/**
	 * @var array<string, CommandHandler>
	 */
	private array $handlers = [];


	/**
	 * @param class-string $command
	 */
	public function registerHandler(string $command, CommandHandler $handler): self
	{
		$this->handlers[$command] = $handler;

		return $this;
	}


	public function handle(Command $command)
	{
		$class = $command::class;
		$handler = $this->handlers[$class] ?? throw new CommandHandlerNotFoundException("No handler registered for command class '{$class}'");

		return $handler->handle($command);
	}

}