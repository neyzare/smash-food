<?php
ini_set('display_errors', '0');
error_reporting(E_ALL);

$fromEnv = getenv('DB_HOST') !== false;

if ($fromEnv) {
    define('DB_HOST',     getenv('DB_HOST'));
    define('DB_NAME',     getenv('DB_NAME'));
    define('DB_USER',     getenv('DB_USERNAME'));
    define('DB_PASSWORD', getenv('DB_PASSWORD'));
} else {
    $env = parse_ini_file(__DIR__ . '/.env');

    if ($env === false) {
        http_response_code(500);
        exit('Une erreur interne est survenue.');
    }

    define('DB_HOST',     $env['DB_HOST']     ?? '');
    define('DB_NAME',     $env['DB_NAME']     ?? '');
    define('DB_USER',     $env['DB_USERNAME'] ?? '');
    define('DB_PASSWORD', $env['DB_PASSWORD'] ?? '');
}
