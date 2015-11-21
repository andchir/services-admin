<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => include __DIR__ . '/../config.inc.php'
));
$app['debug'] = true;
$app['session.storage.handler'] = null;

$app->run();
