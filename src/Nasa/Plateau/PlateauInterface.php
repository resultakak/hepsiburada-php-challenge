<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Nasa\Plateau;

/**
 * Interface PlateauInterface
 *
 * @category PlateauInterface
 * @package  Api\Nasa\Plateau
 */
interface PlateauInterface
{
    /**
     * @return int
     */
    public function getWidth(): int;

    /**
     * @return int
     */
    public function getHeight(): int;
}
