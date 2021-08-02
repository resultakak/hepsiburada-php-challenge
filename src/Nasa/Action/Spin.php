<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Nasa\Action;

/**
 * Class Spin
 *
 * @package Api\Nasa\Action
 * @author  Resul Takak <resultakak@gmail.com>
 */
class Spin implements ActionInterface
{
    public const LEFT  = 'L';
    public const RIGHT = 'R';
    public const AVAILABLE_SPINS = [self::LEFT, self::RIGHT];

    /**
     * @var string $spin
     */
    private $spin = '';

    /**
     * Spin constructor.
     * @param string $input
     */
    public function __construct(string $input)
    {
        if (!in_array($input, self::AVAILABLE_SPINS)) {
            throw new InvalidArgumentException(
                sprintf("Spinning can only be to the following directions %s", $input, implode(self::AVAILABLE_SPINS))
            );
        }

        $this->spin = $input;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->spin;
    }
}
