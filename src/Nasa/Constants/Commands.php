<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Nasa\Constants;

/**
 * Class Commands
 *
 * @package Api\Nasa\Constants
 * @author  Resul Takak <resultakak@gmail.com>
 */
class Commands
{
    public const  NORTH                = 'N';

    public const  SOUTH                = 'S';

    public const  EAST                 = 'E';

    public const  WEST                 = 'W';

    public const  LEFT                 = 'L';

    public const  RIGHT                = 'R';

    public const  AVAILABLE_SPINS      = [self::LEFT, self::RIGHT];

    public const  COMMAND_MOVE         = 'M';

    public const MOVEMENT_FACTOR      = 1;

    public const ALLOWED_COMMANDS     = [
        self::COMMAND_MOVE,
    ];

    public const ALLOWED_ALL_COMMANDS = [
        self::COMMAND_MOVE,
        self::LEFT,
        self::RIGHT
    ];
}
