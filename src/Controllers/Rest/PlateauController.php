<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */

namespace Api\Controllers\Rest;

use Api\Constants\HttpCodes;
use Api\Mvc\Controller;
use Api\Nasa\Plateau\PlateauFactory;
use Api\Repository\PlateauRepository;
use Exception;

use function Api\Core\get_id;

class PlateauController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        try {
            $plateauRepository = new PlateauRepository();

            $plateaus = $plateauRepository->getPlateaus();

            if (false === $plateaus) {
                throw new Exception("Not Found", HttpCodes::NOT_FOUND);
            }

            return $this->response
                ->sendStatus(HttpCodes::OK)
                ->json(['data' => $plateaus]);
        } catch (Exception $ex) {
            return $this->response
                ->sendStatus($ex->getCode())
                ->json(['errors' => ['message' => $ex->getMessage()]]);
        }
    }

    public function getPlateau()
    {
        try {
            $id = get_id();

            $plateauRepository = new PlateauRepository();

            $plateau = $plateauRepository->getPlateau($id);

            if (false === $plateau) {
                throw new Exception("Not Found", HttpCodes::NOT_FOUND);
            }

            // TODO: Input Validation
            $plateau = (new PlateauFactory())->createPlateau(
                (int)$plateau['height'] ?? 0,
                (int)$plateau['width'] ?? 0
            );

            $plateau = [
                'id'     => $id ?? 1,
                'width'  => $plateau->getWidth(),
                'height' => $plateau->getHeight()
            ];

            return $this->response
                ->sendStatus(HttpCodes::OK)
                ->json(['data' => $plateau]);
        } catch (Exception $ex) {
            return $this->response
                ->sendStatus($ex->getCode())
                ->json(['errors' => ['message' => $ex->getMessage()]]);
        }
    }

    public function createPlateau()
    {
        try {
            $plateauRepository = new PlateauRepository();

            $plateau = (new PlateauFactory())->createPlateau(
                (int)$this->request->input('height'),
                (int)$this->request->input('width')
            );

            $plateau = $plateauRepository->createPlateau(
                [
                    'width'  => $plateau->getWidth(),
                    'height' => $plateau->getHeight()
                ]
            );

            return $this->response
                ->sendStatus(HttpCodes::CREATED)
                ->json(['data' => $plateau]);
        } catch (Exception $ex) {
            return $this->response
                ->sendStatus($ex->getCode())
                ->json(['errors' => ['message' => $ex->getMessage()]]);
        }
    }

    public function updatePlateau()
    {
        try {
            $id = get_id();

            $plateauRepository = new PlateauRepository();

            $plateau = $plateauRepository->getPlateau($id);

            if (false === $plateau) {
                throw new Exception("Not Found", HttpCodes::NOT_FOUND);
            }

            // TODO: Input Validation
            $plateau = (new PlateauFactory())->createPlateau(
                (int)$this->request->input('height'),
                (int)$this->request->input('width')
            );

            $plateau = $plateauRepository->updatePlateau(
                [
                    'id'     => $id ?? 1,
                    'width'  => $plateau->getWidth(),
                    'height' => $plateau->getHeight()
                ]
            );

            return $this->response
                ->sendStatus(HttpCodes::ACCEPTED)
                ->json(['data' => $plateau]);
        } catch (Exception $ex) {
            return $this->response
                ->sendStatus($ex->getCode())
                ->json(['errors' => ['message' => $ex->getMessage()]]);
        }
    }

    public function deletePlateau()
    {
        try {
            $id = get_id();

            $plateauRepository = new PlateauRepository();

            $plateau = $plateauRepository->getPlateau($id);

            if (false === $plateau) {
                throw new Exception("Not Found", HttpCodes::NOT_FOUND);
            }

            $plateau = $plateauRepository->deletePlateau($id);

            return $this->response
                ->sendStatus(HttpCodes::OK)
                ->json(['data' => $plateau]);
        } catch (Exception $ex) {
            return $this->response
                ->sendStatus($ex->getCode())
                ->json(['errors' => ['message' => $ex->getMessage()]]);
        }
    }
}
