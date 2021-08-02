<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Nasa\Rover;

use Api\Nasa\Plateau\PlateauInterface;
use Api\Nasa\Position\PositionInterface;

/**
 * Class RoverFactory
 *
 * @package Api\Nasa\Rover
 * @author  Resul Takak <resultakak@gmail.com>
 */
class RoverFactory implements RoverFactoryInterface
{
    public function createRover(PlateauInterface $plateau, PositionInterface $position): Rover
    {
        return new Rover($plateau, $position);
    }
}
