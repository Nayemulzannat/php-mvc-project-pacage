<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Load Composer autoload

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'mvc_raw_php',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make Eloquent available globally
$capsule->setAsGlobal();
$capsule->bootEloquent();
