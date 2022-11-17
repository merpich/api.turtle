<?php

use Core\Services\Router;

Router::api("/register", "RegisterController");
Router::api("/login", "LoginController");

Router::enable();
