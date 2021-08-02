<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Entity;

use function json_decode;
use function json_encode;

/**
 * Class RoverEntity
 *
 * @package Api\Entity
 * @author  Resul Takak <resultakak@gmail.com>
 */
class RoverEntity
{
    /**
     * @var int $plateau
     */
    protected int $plateau;

    /**
     * @var int $coordinateX
     */
    protected int $coordinateX;

    /**
     * @var int $coordinateY
     */
    protected int $coordinateY;

    /**
     * @var string $direction
     */
    protected string $direction;

    /**
     * @param $data
     */
    public function __construct($data)
    {
        $data = json_decode(json_encode($data), true);

        if (array_key_exists('plateau_id', $data)) {
            $this->setPlateau((int) $data['plateau_id']);
        }
        if (array_key_exists('x', $data)) {
            $this->setCoordinateX((int) $data['x']);
        }
        if (array_key_exists('y', $data)) {
            $this->setCoordinateY((int) $data['y']);
        }
        if (array_key_exists('direction', $data)) {
            $this->setDirection((string) $data['direction']);
        }
    }

    /**
     * @return int
     */
    public function getPlateau(): int
    {
        return $this->plateau;
    }

    /**
     * @param int $plateau
     * @return $this
     */
    public function setPlateau(int $plateau): self
    {
        $this->plateau = $plateau;

        return $this;
    }

    /**
     * @return int
     */
    public function getCoordinateX(): int
    {
        return $this->coordinateX;
    }

    /**
     * @param int $coordinateX
     */
    public function setCoordinateX(int $coordinateX): void
    {
        $this->coordinateX = $coordinateX;
    }

    /**
     * @return int
     */
    public function getCoordinateY(): int
    {
        return $this->coordinateY;
    }

    /**
     * @param int $coordinateY
     * @return $this
     */
    public function setCoordinateY(int $coordinateY): self
    {
        $this->coordinateY = $coordinateY;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     * @return $this
     */
    public function setDirection(string $direction): self
    {
        $this->direction = $direction;

        return $this;
    }
}
