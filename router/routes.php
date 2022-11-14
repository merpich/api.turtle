<?php

use App\Services\Router;

Router::api("/register", "register");
Router::api("/login", "login");

Router::enable();
