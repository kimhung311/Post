<?php
include_once('System/libs/Main.php');
include_once('System/libs/DController.php');
include_once('System/libs/DModel.php');
include_once('System/libs/Database.php');
include_once('System/libs/Load.php');

spl_autoload_register(function($class) {
    include_once('System/libs/' . $class . '.php');
});

include_once('App/Config/config.php');
$main = new Main();