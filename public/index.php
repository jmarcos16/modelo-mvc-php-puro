<?php

use App\config\Router;
use App\routes\Route;

require '../vendor/autoload.php';
require '../app/web.php';


// var_dump(Route::getRoutes());
// dd($_SERVER);
// dd();
Router::run();
