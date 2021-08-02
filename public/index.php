<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__).'/');

require BASE_PATH.'/vendor/autoload.php';

use Api\Bootstrap\Application;
use Api\Controllers\DefaultController;
use Api\Controllers\Rest\PlateauController;
use Api\Controllers\Rest\RoverController;

$app = new Application();

$app->router->get('/', [DefaultController::class, 'index']);
$app->router->get('/api/v1/plateaus', [PlateauController::class, 'index']);
$app->router->get('/api/v1/plateau/:id', [PlateauController::class, 'getPlateau']);
$app->router->post('/api/v1/plateau', [PlateauController::class, 'createPlateau']);
$app->router->put('/api/v1/plateau/:id', [PlateauController::class, 'updatePlateau']);
$app->router->delete('/api/v1/plateau/:id', [PlateauController::class, 'deletePlateau']);

$app->router->get('/api/v1/rovers', [RoverController::class, 'index']);
$app->router->get('/api/v1/rover/:id', [RoverController::class, 'getRover']);
$app->router->post('/api/v1/rover', [RoverController::class, 'createRover']);
$app->router->put('/api/v1/rover/:id', [RoverController::class, 'updateRover']);
$app->router->delete('/api/v1/rover/:id', [RoverController::class, 'deleteRover']);

$app->router->get('/api/v1/rover/state/:id', [RoverController::class, 'getRover']);
$app->router->post('/api/v1/rover/command', [RoverController::class, 'commandRover']);

$app->run();
