<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => env('DB_HOST'),
    'username' => env('DB_USERNAME'),
    'password' => env('DB_PASSWORD'),
    'database' => env('DB_NAME'),
    'charset' => 'utf8_unicode_ci',
    'prefix' => ''
]);

$capsule->bootEloquent();