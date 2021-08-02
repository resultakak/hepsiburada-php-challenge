<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Nasa\Plateau;

/**
 * Interface PlateauFactoryInterface
 *
 * @category PlateauFactoryInterface
 * @package  Api\Nasa\Plateau
 */
interface PlateauFactoryInterface
{
    /**
     * @param int $height
     * @param int $width
     * @return Plateau
     */
    public function createPlateau(int $height, int $width): Plateau;
}
