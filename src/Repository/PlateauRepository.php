<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Repository;

/**
 * Class PlateauRepository
 *
 * @package Api\Repository
 * @author  Resul Takak <resultakak@gmail.com>
 */
class PlateauRepository extends Repository
{
    /**
     * @return false|mixed
     */
    public function getPlateaus()
    {
        return $this->fetch('plateaus');
    }

    /**
     * @param int $id
     * @return false|mixed
     */
    public function getPlateau(int $id)
    {
        return $this->findByID('plateaus', $id);
    }

    /**
     * @param $data
     * @return false|mixed
     */
    public function createPlateau($data)
    {
        $data = json_decode(json_encode($data), true);

        return $this->create('plateaus', [
            'id'     => false,
            'width'  => $data['width'],
            'height' => $data['height']
        ]);
    }

    /**
     * @param $data
     * @return false|mixed
     */
    public function updatePlateau($data)
    {
        $data = json_decode(json_encode($data), true);

        return $this->update('plateaus', [
            'id'     => $data['id'],
            'width'  => $data['width'],
            'height' => $data['height']
        ]);
    }

    /**
     * @param int $id
     * @return false|mixed
     */
    public function deletePlateau(int $id)
    {
        return $this->deleteByID('plateaus', $id);
    }
}
