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

if( $app['session']->get('user_id') === null ){
    $app->abort(403, "Request is not allowed.");
    exit;
}

/**
 * Get services list
 * @param object $app
 * @param int $page
 * @returns string
 */
$app->get('/items/{page}', function (Silex\Application $app, $page) {
    
    $pageSize = 10;
    $page = intval($page);
    
    $qb = $app['db']->createQueryBuilder()
        ->select('*')
        ->from('services')
        ->setFirstResult($pageSize * ($page - 1))
        ->setMaxResults($pageSize);
    $data = $qb->execute()->fetchAll();
    
    $total_q = $app['db']->createQueryBuilder()
        ->select('count(*)')
        ->from('services')
        ->execute()
        ->fetch();
    
    $total = intval(current($total_q));
    
    $result['data'] = $data;
    $result['total'] = $total;
    
    return $app->json($result);

});

/**
 * Save new service item
 * @param object $app
 * @returns string
 */
$app->post('/items', function (Silex\Application $app) {
    
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

/**
 * Delete service item 
 * @param int $itemIdp
 * @returns string
 */
$app->delete('/items/{itemIdp}', function (Silex\Application $app, $itemIdp) {
    
    $itemIdp = trim($itemIdp);
    $delete = $app['db']->delete('services', array('idp' => $itemIdp));
    
    $result = array(
        'success' => $delete != false
    );
    
    return $app->json($result);
    
});

/**
 * Get service data
 * @param object $app
 * @param int $itemId
 * @returns string
 */
$app->get('/items/data/{itemId}', function (Silex\Application $app, $itemId) {
    
    $itemId = trim($itemId);
    
    $qb = $app['db']->createQueryBuilder()
        ->select('*')
        ->from('services')
        ->where('id = ?')
        ->setParameter(0, $itemId);
        
    $result = $qb->execute()->fetch();
    $result['idp'] = intval($result['idp']);
    $result['balance'] = floatval($result['balance']);
    $result['min_balance'] = floatval($result['min_balance']);
    $result['credit_limit'] = floatval($result['credit_limit']);
    
    return $app->json($result);
    
});

$app->put('/items/update/{itemId}', function (Silex\Application $app, $itemId) {
    
    $data = json_decode($app['request']->getContent(), true);
    
    $qb = $app['db']->createQueryBuilder()
        ->update('services')
        ->set('idp', ':idp')
        ->set('login', ':login')
        ->set('email', ':email')
        ->set('balance', ':balance')
        ->set('calc_rate_type', ':calc_rate_type')
        ->set('bank', ':bank')
        ->set('dlr_method', ':dlr_method')
        ->set('min_balance', ':min_balance')
        ->set('dlr_data', ':dlr_data')
        ->set('url', ':url')
        ->set('credit_limit', ':credit_limit')
        ->where('id = :id');
    
    foreach( $data as $key => $value ){
        $qb->setParameter( ":{$key}" , $value );
    }
    
    $update = $qb->execute();
    
    $result = array(
        'success' => $update != false
    );
    
    return $app->json($result);
    
});

$app->run();
