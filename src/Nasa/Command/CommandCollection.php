<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Nasa\Command;

use Api\Nasa\Constants\Commands;

/**
 * Class CommandCollection
 *
 * @package Api\Nasa\Command
 * @author  Resul Takak <resultakak@gmail.com>
 */
class CommandCollection implements CommandCollectionInterface
{
    /**
     * @var array $commands
     */
    private array $commands = [];

    /**
     * @param string $commands
     */
    public function __construct($commands)
    {
        if (true === isset($commands)) {
            $commands = str_split($commands);

            if (is_array($commands)) {
                foreach ($commands as $command) {
                    if (in_array($command, Commands::ALLOWED_ALL_COMMANDS)) {
                        $this->commands[] = (new Command($command))->get();
                    }
                }
            }
        }
    }

    /**
     * @return array
     */
    public function getCommands(): array
    {
        return $this->commands;
    }
}
