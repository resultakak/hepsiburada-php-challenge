<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Repository;

use Api\Core\Session;
use Api\Traits\InstanceTrait;

/**
 * Class Repository
 *
 * @package Api\Repository
 * @author  Resul Takak <resultakak@gmail.com>
 */
abstract class Repository
{
    use InstanceTrait;

    /**
     * @var Session $session
     */
    protected Session $session;

    public function __construct()
    {
        $this->session = $this->getInstance()->session;
    }

    /**
     * @param string $repository
     * @param        $data
     * @return false|mixed
     */
    public function create(string $repository, $data)
    {
        $fetch = $this->fetch($repository);

        if (isset($fetch) && ! empty($fetch)) {
            $id = (end($fetch)['id']) + 1 ?? count($fetch) + 1;
            $data['id'] = $id;
        } else {
            $data['id'] = 1;
        }

        $fetch[$data['id']] = $data;

        $this->session->set($repository, json_encode($fetch));

        return $this->findByID($repository, $data['id']);
    }

    /**
     * @param string $repository
     * @return false|mixed
     */
    public function fetch(string $repository)
    {
        $data = $this->session->get($repository);
        return $data ? json_decode($data, true) : false;
    }

    /**
     * @param string $repository
     * @param int    $id
     * @return false|mixed
     */
    public function findByID(string $repository, int $id)
    {
        $fetch = $this->fetch($repository);

        if (! isset($fetch) || empty($fetch)) {
            return false;
        }

        $result = [];
        foreach ($fetch as $key => $value) {
            $result[$value['id']] = $value;
        }

        $result = array_filter($result, function ($var) use ($id) {
            if ($id == $var['id']) {
                return $var;
            }
        });

        return isset($result[$id]) && ! empty($result[$id]) ? $result[$id] : false;
    }

    /**
     * @param string $repository
     * @param        $data
     * @return false|mixed
     */
    public function update(string $repository, $data)
    {
        $fetch = $this->fetch($repository);

        $fetch[$data['id']] = $data;

        $this->session->set($repository, json_encode($fetch));

        return $this->findByID($repository, $data['id']);
    }

    /**
     * @param string $repository
     * @param int    $id
     * @return false|mixed
     */
    public function deleteByID(string $repository, int $id)
    {
        $fetch = $this->fetch($repository);

        if (false === isset($fetch[$id])) {
            return false;
        }

        $data = $fetch[$id];

        unset($fetch[$id]);

        $this->session->set($repository, json_encode($fetch));

        return $data;
    }
}
