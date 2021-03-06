<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Nasa\Action;

/**
 * Class Move
 *
 * @package Api\Nasa\Action
 * @author  Resul Takak <resultakak@gmail.com>
 */
class Move implements ActionInterface
{
    public const  COMMAND_MOVE     = 'M';

    private const MOVEMENT_FACTOR  = 1;

    private const ALLOWED_COMMANDS = [
        self::COMMAND_MOVE,
    ];

    /**
     * @param string $command
     */
    public function __construct(string $command)
    {
        if (! in_array($command, self::ALLOWED_COMMANDS)) {
            throw new \InvalidArgumentException(
                sprintf(
                    '%s is not a defined command. Allowed Commands : %s',
                    $command,
                    implode(',', self::ALLOWED_COMMANDS)
                )
            );
        }
    }

    /**
     * @param int $value
     * @return int
     */
    public function factor(int $value): int
    {
        return (self::MOVEMENT_FACTOR * $value);
    }
}
