<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Nasa\Command;

use Api\Nasa\Action\ActionInterface;
use Api\Nasa\Action\Move;
use Api\Nasa\Action\Spin;
use Api\Nasa\Constants\Commands;

/**
 * Class Command
 *
 * @package Api\Nasa\Command
 * @author  Resul Takak <resultakak@gmail.com>
 */
class Command implements CommandInterface
{
    /**
     * @var string|null $command
     */
    private ?string $command = null;

    public function __construct($command)
    {
        if (in_array($command, Commands::ALLOWED_ALL_COMMANDS)) {
            $this->command = $command;
        }
    }

    public function get()
    {
        if (in_array($this->command, Commands::AVAILABLE_SPINS)) {
            return new Spin($this->command);
        }

        if (in_array($this->command, Commands::ALLOWED_COMMANDS)) {
            return new Move($this->command);
        }
    }
}
