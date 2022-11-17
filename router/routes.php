<?php

use Core\Services\Router;
use App\Controllers\Controller;

Router::api("/", [Controller::class, "index"]);

Router::enable();
