<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => include __DIR__ . '/../config.inc.php'
));
$app['debug'] = false;
$app['session.storage.handler'] = null;

/**
 * Get services list
 * @param object app
 * @returns string
 */
$app->get('/items/getlist', function (Silex\Application $app) {
    
    if( $app['session']->get('user_id') === null ){
        $app->abort(403, "Request is not allowed.");
    }
    
    $sql = 'SELECT * FROM services';
    $result = $app['db']->fetchAll($sql);
    
    return $app->json($result);

});

/**
 * Save new service item
 * @param object app
 * @returns string
 */
$app->post('/items/save', function (Silex\Application $app) {
    
    if( $app['session']->get('user_id') === null ){
        $app->abort(403, "Request is not allowed.");
    }
    
    $content = json_decode($app['request']->getContent(), true);
    
    $data = array();
    $data['idp'] = !empty($content['idp']) ? $content['idp'] : '';
    $data['login'] = !empty($content['login']) ? $content['login'] : '';
    
    $insert = $app['db']->insert('services', array(
        'idp' => $data['idp'],
        'login' => $data['login']
    ));
    
    $result = array(
        'success' => $insert !== false
    );
    
    return $app->json($result);

});

$app->run();
