<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Repository;

/**
 * Class RoverRepository
 *
 * @package Api\Repository
 * @author  Resul Takak <resultakak@gmail.com>
 */
class RoverRepository extends Repository
{
    /**
     * @return false|mixed
     */
    public function getRovers()
    {
        return $this->fetch('rovers');
    }

    /**
     * @param int $id
     * @return false|mixed
     */
    public function getRover(int $id)
    {
        return $this->findByID('rovers', $id);
    }

    /**
     * @param $data
     * @return false|mixed
     */
    public function createRover($data)
    {
        $data = json_decode(json_encode($data), true);

        return $this->create('rovers', [
            'id'         => false,
            'plateau_id' => $data['plateau_id'],
            'x'          => $data['x'],
            'y'          => $data['y'],
            'direction'  => $data['direction']
        ]);
    }

    /**
     * @param $data
     * @return false|mixed
     */
    public function updateRover($data)
    {
        $data = json_decode(json_encode($data), true);

        return $this->update('rovers', [
            'id'         => (int) $data['id'],
            'plateau_id' => $data['plateau_id'],
            'x'          => $data['x'],
            'y'          => $data['y'],
            'direction'  => $data['direction']
        ]);
    }

    /**
     * @param int $id
     * @return false|mixed
     */
    public function deleteRover(int $id)
    {
        return $this->deleteByID('rovers', $id);
    }
}
