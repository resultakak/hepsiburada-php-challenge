<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */

namespace Api\Controllers\Rest;

use Api\Constants\HttpCodes;
use Api\Entity\RoverEntity;
use Api\Mvc\Controller;
use Api\Nasa\Plateau\PlateauFactory;
use Api\Nasa\Position\Position;
use Api\Nasa\Rover\RoverFactory;
use Api\Nasa\Command\CommandCollection as Commands;
use Api\Repository\PlateauRepository;
use Api\Repository\RoverRepository;
use Exception;

use function Api\Core\get_id;

/**
 * Class RoverController
 *
 * @package Api\Controllers\Rest
 * @author  Resul Takak <resultakak@gmail.com>
 */
class RoverController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        try {
            $roverRepository = new RoverRepository();

            $rovers = $roverRepository->getRovers();

            if (false === $rovers) {
                throw new Exception("Rovers Not Found", HttpCodes::NOT_FOUND);
            }

            return $this->response
                ->sendStatus(HttpCodes::OK)
                ->json(['data' => $rovers]);
        } catch (Exception $ex) {
            return $this->response
                ->sendStatus($ex->getCode())
                ->json(['errors' => ['message' => $ex->getMessage()]]);
        }
    }

    public function getRover()
    {
        try {
            $id = get_id();

            $roverRepository = new RoverRepository();

            $rovers = $roverRepository->getRover($id);

            if (false === $rovers) {
                throw new Exception("Rover Not Found", HttpCodes::NOT_FOUND);
            }

            return $this->response
                ->sendStatus(HttpCodes::OK)
                ->json(['data' => $rovers]);
        } catch (Exception $ex) {
            return $this->response
                ->sendStatus($ex->getCode())
                ->json(['errors' => ['message' => $ex->getMessage()]]);
        }
    }

    public function createRover()
    {
        try {
            $roverRepository = new RoverRepository();
            $plateauRepository = new PlateauRepository();

            $roverData = new RoverEntity($this->request->input());

            $plateau = $plateauRepository->getPlateau($roverData->getPlateau());

            if (false === $plateau) {
                throw new Exception("Plateau Not Found", HttpCodes::NOT_FOUND);
            }

            $plateau = (new PlateauFactory())->createPlateau(
                (int)$plateau['height'] ?? 0,
                (int)$plateau['width'] ?? 0
            );

            $position = new Position(
                $roverData->getCoordinateX(),
                $roverData->getCoordinateY(),
                $roverData->getDirection()
            );

            $rover = (new RoverFactory())->createRover($plateau, $position);

            $rover = $roverRepository->createRover(
                [
                    'plateau_id' => $roverData->getPlateau(),
                    'x'          => $roverData->getCoordinateX(),
                    'y'          => $roverData->getCoordinateY(),
                    'direction'  => $roverData->getDirection()
                ]
            );

            return $this->response
                ->sendStatus(HttpCodes::CREATED)
                ->json(['data' => $rover]);
        } catch (Exception $ex) {
            return $this->response
                ->sendStatus($ex->getCode())
                ->json(['errors' => ['message' => $ex->getMessage()]]);
        }
    }

    public function updateRover()
    {
        try {
            $roverRepository = new RoverRepository();
            $plateauRepository = new PlateauRepository();

            $id = get_id();

            $rover = $roverRepository->getRover($id);

            if (false === $rover) {
                throw new Exception("Rover Not Found", HttpCodes::NOT_FOUND);
            }

            $roverData = new RoverEntity($this->request->input());

            $plateau = $plateauRepository->getPlateau($roverData->getPlateau());

            if (false === $plateau) {
                throw new Exception("Plateau Not Found", HttpCodes::NOT_FOUND);
            }

            $plateau = (new PlateauFactory())->createPlateau(
                (int)$plateau['height'] ?? 0,
                (int)$plateau['width'] ?? 0
            );

            $position = new Position(
                $roverData->getCoordinateX(),
                $roverData->getCoordinateY(),
                $roverData->getDirection()
            );

            $rover = (new RoverFactory())->createRover($plateau, $position);

            $rover = $roverRepository->updateRover(
                [
                    'id'         => $id,
                    'plateau_id' => $roverData->getPlateau(),
                    'x'          => $roverData->getCoordinateX(),
                    'y'          => $roverData->getCoordinateY(),
                    'direction'  => $roverData->getDirection()
                ]
            );

            return $this->response
                ->sendStatus(HttpCodes::ACCEPTED)
                ->json(['data' => $rover]);
        } catch (Exception $ex) {
            return $this->response
                ->sendStatus($ex->getCode())
                ->json(['errors' => ['message' => $ex->getMessage()]]);
        }
    }

    public function deleteRover()
    {
        try {
            $roverRepository = new RoverRepository();

            $id = get_id();

            $rover = $roverRepository->getRover($id);

            if (false === $rover) {
                throw new Exception("Rover Not Found", HttpCodes::NOT_FOUND);
            }

            $rover = $roverRepository->deleteRover($id);

            return $this->response
                ->sendStatus(HttpCodes::OK)
                ->json(['data' => $rover]);
        } catch (Exception $ex) {
            return $this->response
                ->sendStatus($ex->getCode())
                ->json(['errors' => ['message' => $ex->getMessage()]]);
        }
    }

    public function commandRover()
    {
        try {
            $roverRepository = new RoverRepository();
            $plateauRepository = new PlateauRepository();

            $id = (int) $this->request->input('rover_id');

            $rover = $roverRepository->getRover($id);

            if (false === $rover) {
                throw new Exception("Rover Not Found", HttpCodes::NOT_FOUND);
            }

            $roverData = new RoverEntity($rover);

            $plateau = $plateauRepository->getPlateau($roverData->getPlateau());

            if (false === $plateau) {
                throw new Exception("Plateau Not Found", HttpCodes::NOT_FOUND);
            }

            $plateau = (new PlateauFactory())->createPlateau(
                (int)$plateau['height'] ?? 0,
                (int)$plateau['width'] ?? 0
            );

            $position = new Position(
                $roverData->getCoordinateX(),
                $roverData->getCoordinateY(),
                $roverData->getDirection()
            );

            $rover = (new RoverFactory())->createRover($plateau, $position);

            $commands = new Commands($this->request->input('commands'));

            $rover->commands($commands);

            $rover = $roverRepository->updateRover(
                [
                    'id'         => $id,
                    'plateau_id' => $roverData->getPlateau(),
                    'x'          => $rover->getPosition()->getX(),
                    'y'          => $rover->getPosition()->getY(),
                    'direction'  => $rover->getPosition()->getDirection(),
                ]
            );

            return $this->response
                ->sendStatus(HttpCodes::OK)
                ->json(['data' => $rover]);
        } catch (Exception $ex) {
            return $this->response
                ->sendStatus($ex->getCode())
                ->json(['errors' => ['message' => $ex->getMessage()]]);
        }
    }
}
