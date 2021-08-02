<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Nasa\Rover;

use Api\Nasa\Action\ActionInterface;
use Api\Nasa\Command\CommandCollectionInterface;
use Api\Nasa\Plateau\PlateauInterface;
use Api\Nasa\Position\Position;
use Api\Nasa\Position\PositionInterface;
use Api\Nasa\Rover\Controller\Controller;
use OutOfBoundsException;

/**
 * Class Rover
 *
 * @package Api\Nasa\Rover
 * @author  Resul Takak <resultakak@gmail.com>
 */
class Rover
{
    /**
     * @var PlateauInterface $plateau
     */
    private PlateauInterface $plateau;

    /**
     * @var PositionInterface $position
     */
    private PositionInterface $position;

    /**
     * @param PlateauInterface  $plateau
     * @param PositionInterface $position
     */
    public function __construct(PlateauInterface $plateau, PositionInterface $position)
    {
        $this->plateau = $plateau;
        $this->position = $position;
        $this->controller = new Controller($this->plateau, $this->position);
    }


    public function commands(CommandCollectionInterface $commands)
    {
        $commands = $commands->getCommands();

        if (is_array($commands)) {
            foreach ($commands as $command) {
                $this->controller->command($command);
            }
        }
    }

    public function command(ActionInterface $command)
    {
        $this->controller->command($command);
    }

    /**
     * @return Position
     */
    public function getPosition(): Position
    {
        return $this->position;
    }

    public function __toString()
    {
        $pos = $this->position->toArray();
        return "X: {$pos["x"]} - Y: {$pos["y"]} - D: {$pos["direction"]}";
    }
}
