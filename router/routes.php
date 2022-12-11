<?php

use Core\Services\Router;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\CodeController;

Router::api("/login", [LoginController::class, "index"]);
Router::api("/register", [RegisterController::class, "index"]);
Router::api("/code", [CodeController::class, "index"]);

Router::enable();
