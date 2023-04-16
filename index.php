<?php

declare(strict_types=1);

namespace App;

require_once('./Excpetion/AppException.php');
require_once('./Excpetion/StorageException.php');
require_once('./Excpetion/ConfigurationExcption.php');
include_once('./src/Controller.php');
include_once('./src/utils/debug.php');
require_once('./config/config.php');

use App\Exception\AppException;
use App\Exception\StorageException;
use App\Exception\ConfigurationException;
use Throwable;


$request = [
    'get' => $_GET,
    'post' => $_POST,
];

try {
    Controller::initConfiguration($configuration);
    $controller = new Controller($request);
    $controller->run();
} catch (AppException $e) {
    echo "<h1>Wsytąpił błąd w aplikacji!</h1>";
    echo '<h3>' . $e->getMessage() . '</h3>';
} catch (Throwable $e) {
    echo "<h1> Wystąpił błąd w aplikacji!</h1>";
}
