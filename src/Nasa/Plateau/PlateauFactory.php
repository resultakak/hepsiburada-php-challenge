<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Nasa\Plateau;

/**
 * Class PlateauFactory
 *
 * @package Api\Nasa\Plateau
 * @author  Resul Takak <resultakak@gmail.com>
 */
class PlateauFactory implements PlateauFactoryInterface
{
    /**
     * @param int $height
     * @param int $width
     * @return Plateau
     */
    public function createPlateau(int $height, int $width): Plateau
    {
        return new Plateau($height, $width);
    }
}
