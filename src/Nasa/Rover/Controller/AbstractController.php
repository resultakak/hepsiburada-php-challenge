<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Nasa\Rover\Controller;

use Api\Nasa\Plateau\PlateauInterface;
use Api\Nasa\Position\PositionInterface;
use OutOfBoundsException;

/**
 * Class AbstractController
 *
 * @package Api\Nasa\Rover\Controller
 * @author  Resul Takak <resultakak@gmail.com>
 */
abstract class AbstractController implements ControllerInterface
{
    /**
     * @var PlateauInterface $plateau
     */
    public PlateauInterface $plateau;

    /**
     * @var PositionInterface $position
     */
    public PositionInterface $position;

    /**
     * @var array $log
     */
    public array $log = [];

    /**
     * @param PlateauInterface  $plateau
     * @param PositionInterface $position
     */
    public function __construct(PlateauInterface $plateau, PositionInterface $position)
    {
        $this->plateau = $plateau;
        $this->position = $position;
        $this->checkPosition();
    }

    protected function checkPosition(): void
    {
        if ($this->position->getX() > $this->plateau->getWidth() || $this->position->getX() < 0 ||
            $this->position->getY() > $this->plateau->getHeight() || $this->position->getY() < 0) {
            throw new OutOfBoundsException('Rover position is out of plateau bounds');
        }
    }
}
