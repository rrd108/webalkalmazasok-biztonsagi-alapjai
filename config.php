<?php


ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
}

$secrets = [
    'db' => [
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '123',
        'name' => 'vulnerable_shop'
    ]
];
