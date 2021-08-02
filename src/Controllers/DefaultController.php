<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */

namespace Api\Controllers;

use Api\Mvc\Controller;

/**
 * Class DefaultController
 *
 * @package Api\Controllers
 * @author  Resul Takak <resultakak@gmail.com>
 */
class DefaultController extends Controller
{
    public function index()
    {
        return $this->response("🚀 Ready!");
    }
}
