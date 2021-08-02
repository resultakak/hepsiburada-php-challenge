<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Traits;

use Api\Bootstrap\Application;

trait InstanceTrait
{
    /**
     * @return Application
     */
    public function getInstance(): Application
    {
        return Application::$app;
    }
}
