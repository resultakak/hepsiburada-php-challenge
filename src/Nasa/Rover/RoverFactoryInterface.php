<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */

namespace Api\Nasa\Rover;

use Api\Nasa\Plateau\PlateauInterface;
use Api\Nasa\Plateau\RoverIn;
use Api\Nasa\Position\PositionInterface;

/**
 * Interface RoverFactoryInterface
 *
 * @category RoverFactoryInterface
 * @package  Api\Nasa\Rover
 */
interface RoverFactoryInterface
{
    /**
     * @param PlateauInterface  $plateau
     * @param PositionInterface $position
     * @return RoverInterface
     */
    public function createRover(PlateauInterface $plateau, PositionInterface $position): Rover;
}
