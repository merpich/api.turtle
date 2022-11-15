<?php

use App\Services\Router;

Router::api("/register", "RegisterController");
Router::api("/login", "LoginController");

Router::enable();
