<?php

namespace Api\Nasa\Position;

use Api\Nasa\Constants\Directions;
use OutOfBoundsException;

class Position implements PositionInterface
{
    private int $x;
    private int $y;
    private string $direction;
    private int $degree;

    /**
     * Position constructor.
     * @param int $x
     * @param int $y
     * @param string $direction
     */
    public function __construct(int $x, int $y, string $direction)
    {
        $this->setX($x);
        $this->setY($y);
        $this->setDirection($direction);

        switch ($direction) {
            case Directions::EAST:
                $this->degree = 90;
                break;
            case Directions::SOUTH:
                $this->degree = 180;
                break;
            case Directions::WEST:
                $this->degree = 270;
                break;
            default:
                $this->degree = 0;
        }
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @param int $x
     */
    public function setX(int $x)
    {
        if ($x < 0) {
            throw new OutOfBoundsException('Rover position is out of plateau bounds');
        }

        $this->x = $x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @param int $y
     */
    public function setY(int $y)
    {
        if ($y < 0) {
            throw new OutOfBoundsException('Rover position is out of plateau bounds');
        }

        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getDegree(): int
    {
        return $this->degree;
    }

    /**
     * @param int $degree
     */
    public function setDegree(int $degree)
    {
        if ($degree >= 360) {
            $degree -= 360;
        }

        if ($degree < 0) {
            $degree += 360;
        }

        $this->degree = $degree;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @param string $direction - Ex: Direction::Top
     */
    public function setDirection(string $direction)
    {
        if (!in_array($direction, [Directions::NORTH, Directions::EAST, Directions::WEST, Directions::SOUTH])) {
            throw new \InvalidArgumentException('Direction value is not correct! Expected values: E, W, N, S');
        }
        $this->direction = $direction;
    }

    public function __toString()
    {
        return "X: {$this->x} Y: {$this->y} {$this->direction}";
    }

    public function toArray(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
            'direction' => $this->direction
        ];
    }
}
