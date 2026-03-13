<?php
ini_set('display_errors', '0');
error_reporting(E_ALL);

$env = parse_ini_file(__DIR__ . '/.env');

if ($env === false) {
    error_log('[smash-food] Impossible de lire le fichier .env');
    http_response_code(500);
    exit('Une erreur interne est survenue.');
}

define('DB_HOST',     $env['DB_HOST']     ?? '');
define('DB_NAME',     $env['DB_NAME']     ?? '');
define('DB_USER',     $env['DB_USERNAME'] ?? '');
define('DB_PASSWORD', $env['DB_PASSWORD'] ?? '');
