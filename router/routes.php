<?php

use Core\Services\Router;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;

Router::api("/login", [LoginController::class, "index"]);
Router::api("/register", [RegisterController::class, "index"]);

Router::enable();
