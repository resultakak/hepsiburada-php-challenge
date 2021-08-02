<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Nasa\Rover\Controller;

use Api\Nasa\Action\ActionInterface;
use Api\Nasa\Action\Move;
use Api\Nasa\Action\Spin;
use Api\Nasa\Constants\Commands;
use Api\Nasa\Constants\Directions;
use Exception;

/**
 * Class Controller
 *
 * @package Api\Nasa\Rover\Controller
 * @author  Resul Takak <resultakak@gmail.com>
 */
class Controller extends AbstractController
{
    /**
     * @param $command
     * @throws Exception
     */
    public function command(ActionInterface $command): void
    {
        if ($command instanceof Spin) {
            $this->spin($command);
        }

        if ($command instanceof Move) {
            $this->move($command);
        }
    }

    /**
     * @param ActionInterface $spin
     */
    protected function spin(ActionInterface $spin): void
    {
        if (Commands::LEFT == $spin) {
            $this->position->setDegree(-90 + $this->position->getDegree());
            $this->log[] = "Turned Left";
        }

        if (Commands::RIGHT == $spin) {
            $this->position->setDegree(90 + $this->position->getDegree());
            $this->log[] = "Turned Right";
        }

        switch ($this->position->getDegree()) {
            case 90:
                $direction = Directions::EAST;
                break;
            case 180:
                $direction = Directions::SOUTH;
                break;
            case 270:
                $direction = Directions::WEST;
                break;
            default:
                $direction = Directions::NORTH;
        }

        $this->position->setDirection($direction);
    }

    /**
     * @param ActionInterface $move
     * @throws Exception
     */
    protected function move(ActionInterface $move): void
    {
        try {
            $y = $this->position->getY();
            $x = $this->position->getX();

            switch ($this->position->getDirection()) {
                case Directions::SOUTH:
                    $this->position->setY($y - 1);
                    break;

                case Directions::NORTH:
                    $this->position->setY($y + 1);
                    break;

                case Directions::WEST:
                    $this->position->setX($x - 1);
                    break;

                case Directions::EAST:
                    $this->position->setX($x + 1);
                    break;

                default:
                    break;
            }

            $this->checkPosition();

            $this->log[] = "Moved";
        } catch (Exception $exception) {
            throw new Exception("Rover can't go there!");
        }
    }
}
