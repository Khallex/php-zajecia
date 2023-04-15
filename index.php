<?php

declare(strict_types=1);

namespace App;

include_once('./src/Controller.php');
include_once('./src/utils/debug.php');
require_once('./config/config.php');


const DEFAULT_ACTION = 'list';

Controller::initConfiguration($configuration);
$controller = new Controller($_GET, $_POST);
$controller->run();
