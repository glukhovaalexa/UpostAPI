<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . '/vendor/autoload.php';

use Api\Classes\App;

require __DIR__ . '/Api/routing.php';

//start tha app
$app = new App();
$app->run();