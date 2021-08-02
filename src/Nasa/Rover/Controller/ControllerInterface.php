<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Nasa\Rover\Controller;

use Api\Nasa\Action\ActionInterface;
use Api\Nasa\Plateau\PlateauInterface;
use Api\Nasa\Position\PositionInterface;

/**
 * Interface ControllerInterface
 *
 * @category ControllerInterface
 * @package  Api\Nasa\Rover\Controller
 */
interface ControllerInterface
{
    /**
     * @param PlateauInterface  $plateau
     * @param PositionInterface $position
     */
    public function __construct(PlateauInterface $plateau, PositionInterface $position);

    /**
     * @param ActionInterface $command
     */
    public function command(ActionInterface $command): void;
}
