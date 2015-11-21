<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

$app = new Silex\Application();
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => include __DIR__ . '/config.inc.php'
));
$app['debug'] = false;
$app['session.storage.handler'] = null;

$app->match('/auth', function (Silex\Application $app) {
    
    if( $app['session']->get('user_id') !== null ){
        return $app->redirect($app["request"]->getBaseUrl());
    }
    
    $data = array();
    $data['username'] = $app['request']->get('username');
    $data['password'] = $app['request']->get('password');
    $data['errors'] = array();
    
    if( $data['username'] && $data['password'] ){
        
        $sql = 'SELECT * FROM users WHERE username = ?';
        $user = $app['db']->fetchAssoc($sql, array($data['username']));
        
        if( $user === false ) {
            $data['errors'][] = 'Неправильное имя пользователя или пароль.';
        }
        else {
            
            if( password_verify($data['password'], $user['password']) ){
                $app['session']->set('user_id', $user['id']);
                return $app->redirect($app["request"]->getBaseUrl());
            }
            else {
                $data['errors'][] = 'Неправильное имя пользователя или пароль.';
            }
            
        }
        
    }
    
    include __DIR__ . '/templates/auth.tpl.php';
    
    return '';

})
->method('GET|POST');

$app->get('/', function (Silex\Application $app) {
    
    if( $app['session']->get('user_id') === null ){
        return $app->redirect( $app["request"]->getBaseUrl() . '/auth' );
    }
    
    include __DIR__ . '/templates/page.tpl.php';
    
    return '';

});

$app->get('/logout', function (Silex\Application $app) {
    $app['session']->set('user_id', null);
    return $app->redirect( $app["request"]->getBaseUrl() . '/auth' );
});

$app->run();
