<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */

namespace Api\Controllers;

use Api\Constants\HttpCodes;
use Api\Mvc\Controller;
use Api\Traits\InstanceTrait;

/**
 * Class NotFoundController
 *
 * @package Api\Controllers
 * @author  Resul Takak <resultakak@gmail.com>
 */
class NotFoundController extends Controller
{
    use InstanceTrait;

    public function index()
    {
        return $this->response
            ->sendStatus(HttpCodes::NOT_FOUND)
            ->json(['errors' => ['message' => 'Not Found']]);
    }
}
