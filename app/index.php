<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'dbname' => 'services-admin',
        'user' => 'services',
        'password' => 'QSHms27ajPrUSeBZ'
    ),
));
$app['debug'] = true;
$app['session.storage.handler'] = null;

$app->run();
