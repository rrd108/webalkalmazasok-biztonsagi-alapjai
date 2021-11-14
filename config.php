<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$secrets = [
    'db' => [
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '123',
        'name' => 'vulnerable_shop'
    ]
];
