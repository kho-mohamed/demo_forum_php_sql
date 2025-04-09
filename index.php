<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("config/config.php");
require_once("lib/core.php");

$controller = isset($_REQUEST['controller']) ? safe($_REQUEST['controller']) : $config['default_controller'];
$function = isset($_REQUEST['function']) ? safe($_REQUEST['function']) : $config['default_function'];

$controller_file = "controllers/" . ucfirst($controller) . "Controller.php";
if (!file_exists($controller_file)) {
    trigger_error('Could not find this file');
    exit();
}
require_once($controller_file);

$controller_function = strtolower($controller) . "_controller_" . $function;
if (!function_exists($controller_function)) {
    trigger_error('Could not find this function');
    exit();
}
call_user_func($controller_function, $_REQUEST);