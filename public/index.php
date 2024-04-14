<?php

use core\core;

session_start();
require "config.php";
require_once "autoload.php";
$core = new core();
$core->run();


?>