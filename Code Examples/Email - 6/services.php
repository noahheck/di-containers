<?php
/**
 * @copyright   2018 Noah Heck
 * @since       2018-09-17
 */

$config = include "config.php";

$di = new DIContainer;

include __DIR__ . "/services/services.php";

if (file_exists(__DIR__ . "/services/{$config['env']}.php")) {
    include __DIR__ . "/services/{$config['env']}.php";
}
