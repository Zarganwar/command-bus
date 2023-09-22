<?php


namespace Zarganwar\CommandBus\Command;


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

	public function handle(Command $command): void
	{
		$class = $command::class;
		$handler = $this->handlers[$class] ?? throw new RuntimeException("No handler registered for {$class}");
		$handler->handle($command);
	}

}