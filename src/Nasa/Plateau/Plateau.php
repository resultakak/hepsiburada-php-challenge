<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Nasa\Plateau;

use InvalidArgumentException;

class Plateau implements PlateauInterface
{
    /**
     * @var int $height
     */
    private int $height;

    /**
     * @var int $width
     */
    private int $width;

    /**
     * @param int $height
     * @param int $width
     */
    public function __construct(int $height, int $width)
    {
        if ($height < 0 || $width < 0) {
            throw new InvalidArgumentException('Height or Width cannot be under 0');
        }

        $this->height = $height;
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }
}
